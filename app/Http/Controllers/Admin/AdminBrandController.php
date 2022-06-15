<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(12)->where('deleted_at', null);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {

        $title = 'Ajouter une nouvelle marque';
        return view('admin.brands.create',
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
    public function edit(Brand $brand){
        $title = 'Modifier :';
        return view('admin.brands.edit',
            compact('title', 'brand'));
    }
    public function update(Brand $brand){
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('brands', 'name')->ignore($brand->id)],
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        /* Store image in storage file */
        $image = request()->file('image');
        $not_resized = request()->file('image')->store('images/brands/original');
        $now = Carbon::now()->toDateTimeString();
        $resize = Image::make($image)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();
        $hash = md5($image->__toString() . $now);
        $image = "images/brands/thumbnail/{$hash}.{$image->extension()}";
        Storage::put($image, $resize);

        $attributes['image'] = $not_resized;
        $attributes['thumbnail'] = $image;
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        $attributes['updated_at'] = now();

        $brand->update($attributes);

        return back()->with('message', "Modification enregistrée");
    }
}
