<?php

namespace App\Models;

use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Request;
use Storage;

class Downloads extends Model
{
	use Categorizable;

	protected $fillable = ['file_id'];

	public $bufferFileId = null;

	public function file()
	{
		return $this->belongsTo(File::class);
	}

	public function setTypoAttribute(UploadedFile $file = null)
	{
//		dd(Request::all());
		$file_id = null;
		if (($this->file and $file) or ($this->file and Request::get('typo_remove') == 1)) {
			if ($this->file()->delete())
				Storage::disk('local')->delete($this->file->filename);
		}
		if ($file) {
			$extension = $file->getClientOriginalExtension();
			$fileName = md5($file->getFilename()) . time();

			$entry = new File();
			$entry->mime = $file->getClientMimeType();
			$entry->original_filename = $file->getClientOriginalName();
			$entry->filename = $fileName . '.' . $extension;
			$entry->save();
			if ($file_id = $entry->id)
				Storage::disk('local')->put($fileName . '.' . $extension, \File::get($file));
		}
		$this->attributes['file_id'] = $file_id;
		$this->bufferFileId = $file_id;
	}

	public function getTypoAttribute()
	{
		if ($this->file)
			return storage_path($this->file->filename);
		else
			return null;
	}

	public function setSlugAttribute($slug)
	{
		if ($slug == '') $slug = str_slug(Request::get('name'), '_');
		if ($cat = self::where('slug', $slug)->first()) {
			$idmax = self::max('id') + 1;
			if (isset($this->attributes['id'])) {
				if ($this->attributes['id'] != $cat->id) {
					$slug = $slug . '_' . ++$idmax;
				}
			} else {
				if (self::where('slug', $slug)->count() > 0)
					$slug = $slug . '_' . ++$idmax;
			}
		}
		$this->attributes['slug'] = $slug;
	}

	public static function boot()
	{
		parent::boot();

		static::saved(function ($downloads) {
			if ($downloads->file_id != $downloads->bufferFileId){
				$downloads->file_id = $downloads->bufferFileId;
				$downloads->save();
			}
		});
	}
}
