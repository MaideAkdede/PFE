<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $title = 'Ajouter une nouvelle sous-catégories';
        return view('admin.subcategories.create',
            compact('title'));
    }

    public function store()
    {
        /* Validate attributes*/
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('brands', 'name')],
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        /* Store image in storage file */

        $not_resized = request()->file('image')->store('images/brands/original');

        $attributes['image'] = request()->file('image');
        $now = Carbon::now()->toDateTimeString();

        $resize = Image::make($attributes['image'])->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();

        $hash = md5($attributes['image']->__toString() . $now);

        $attributes['image'] = "images/brands/thumbnail/{$hash}.{$attributes['image']->extension()}";

        Storage::put($attributes['image'], $resize);

        /* Create New Brand */
        $brand = Brand::create([
            'name' => ucwords($attributes['name']),
            'slug' => Str::slug($attributes['name'], '-'),
            'thumbnail' => $attributes['image'],
            'image' => $not_resized,
            'created_at' => now(),
        ]);


        return back()->with('message', "La marque $brand->name a bien été ajoutée !");
    }
}
