<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show(Subcategory $subcategory)
    {
        $title = '';
        $route = '';
        $all_subcategories = '';

        if($subcategory->category_id == '1'){
            $title = "Toutes les boissons : {$subcategory->name}";
            $route = '/boissons/';
            $all_subcategories = Subcategory::drinks()->orderBy('name')->get();
        } elseif($subcategory->category_id == '2') {
            $title = "Tous les snacks : {$subcategory->name}";
            $route = '/snacks/';
            $all_subcategories = Subcategory::snacks()->orderBy('name')->get();
        } else{
            abort(404);
        }
        $products = $subcategory->products()->paginate(12);
        return view('products.index', compact('title', 'subcategory', 'products', 'route', 'all_subcategories'));
    }
}
