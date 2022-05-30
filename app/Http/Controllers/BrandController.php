<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('brands.index', [
            'brands' => $brands,
            'title' => 'Les marques que nous vendons',
            'route' => '/marques/',
        ]);
    }

    public function show(Brand $brand)
    {
        $title = "Tous les produits de {$brand->name}";
        //$products = Product::where('brand_id', '=', $brand->id)->paginate(5)->get();
        return view('brands.show', compact('title', 'brand'));
    }
}
