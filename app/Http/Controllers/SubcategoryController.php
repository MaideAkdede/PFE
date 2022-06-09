<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::paginate(5)->sortBy('name');
        return view('subcategories.index', [
            '$subcategories' => $subcategories,
            'title' => 'Les marques que nous vendons',
            'route' => '/sous-categories/',
        ]);
    }

    public function show(Subcategory $subcategory)
    {
        if($subcategory->category = 2){
            $title = "Tous les boissons : {$subcategory->name}";
        } else {
            $title = "Tous les snacks : {$subcategory->name}";
        }
        return view('brands.show', compact('title', 'brand'));
    }
}
