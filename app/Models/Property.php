<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function property_type()
	{
		return $this->belongsTo(PropertyType::class);
	}

	public function scopeWithProduct($query, $productId)
	{
		return $query->where('product_id', $productId);
	}
}
