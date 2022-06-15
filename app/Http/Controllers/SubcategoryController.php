<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show(Subcategory $subcategory)
    {
        if($subcategory->category = 2){
            $title = "Toutes les boissons : {$subcategory->name}";
            $route = '/boissons/';
            $all_subcategories = Subcategory::drinks()->orderBy('name')->get();
        } else {
            $title = "Tous les snacks : {$subcategory->name}";
            $route = '/snacks/';
            $all_subcategories = Subcategory::snacks()->orderBy('name')->get();
        }
        $products = $subcategory->products()->paginate(12);
        return view('products.index', compact('title', 'subcategory', 'products', 'route', 'all_subcategories'));
    }
}
