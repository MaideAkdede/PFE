<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('deleted_at', null)->paginate(12)->sortBy('name');
        return view('brands.index', [
            'brands' => $brands,
            'title' => 'Les marques disponibles',
            'route' => '/marques/',
        ]);
    }

    public  function show(Brand $brand)
    {
        if($brand->deleted_at != null){
            abort(404);
        }
        $title = "Tous les produits de {$brand->name}";
        $products = $brand->products()->paginate(12);
        return view('brands.show', compact('title', 'brand', 'products'));
    }
}
