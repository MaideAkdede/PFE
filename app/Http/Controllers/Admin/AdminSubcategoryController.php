<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminSubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::paginate(12);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $title = 'Ajouter une nouvelle sous-catégorie';
        $categories = Category::all();
        return view('admin.subcategories.create',
            compact('title', 'categories'));
    }

    public function store()
    {
        /* Validate attributes*/
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('subcategories', 'name')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        /* Store to DB */
        $item = Subcategory::create([
            'name' => ucwords($attributes['name']),
            'slug' => Str::slug($attributes['name'], '-'),
            'category_id' => $attributes['category_id'],
            'created_at' => now(),
        ]);

        return back()->with('message', "La sous-catégorie $item->name a bien été ajouté !");
    }

    public function edit(Subcategory $subcategory)
    {
        $title = 'Modifier :';
        $categories = Category::all();

        return view('admin.subcategories.edit',
            compact('title', 'categories', 'subcategory'));
    }

    public function update(Subcategory $subcategory)
    {
        /* Validate attributes*/
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('subcategories', 'name')->ignore($subcategory->id)],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['updated_at'] = now();
        $attributes['name'] = ucwords($attributes['name']);
        $attributes['slug'] = Str::slug($attributes['name'], '-');

        $subcategory->update($attributes);

        return back()->with('message', "$subcategory->name a bien été modifié ! ");
    }
}
