<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function view(){

    	$product = Product::with('properties.property_type', 'categories')->firstOrFail();
    	$properties = $product->properties->groupBy('property_type.slug')->toArray();

//    	dd( $product );

		$data = array(
			'title' => $product->name,
			'product' => $product,
			'properties' => $properties,
		);
		return view('front.catalog.detail', $data);
	}
}
