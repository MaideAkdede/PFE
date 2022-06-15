<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <x-admin-back/>
        <div class="my-10 md:max-w-xl px-5 pt-10 pb-14 rounded-lg mx-5 md:mx-auto border border-primary-dark">
            <h1 class="title-primary text-center mb-8">
                Ajouter un nouveau produit
            </h1>
            @if(session()->has('message'))
                <div class="bg-green-200 py-2 text-center rounded font-lato-bold mb-6">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <form class="flex flex-col gap-y-6 sm:grid gap-x-4 sm:grid-cols-3" action="/admin/produits/ajouter" method="POST"
                  enctype="multipart/form-data">
                @csrf
                {{--Sélectionner une catégorie existante--}}
                <x-form.select label="Catégorie" name="category_id" class="col-span-full">
                    @foreach($categories as $category)
                        <option
                            value=" {{$category->id}}" {{ old('category_id') == $category->id ? 'selected':'' }}>{{$category->name}}</option>
                    @endforeach
                </x-form.select>
                <div class="col-span-full">
                    {{--Séléctionner une marque existante--}}
                    <x-form.select label="Marque" name="brand_id" class="">
                        @foreach($brands as $brand)
                            <option
                                value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' :'' }}>{{$brand->name}}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.error-message field="brand_id"/>

                    {{--Ajouter une nouvelle marque--}}
                    <div class="">
                        <label class="underline text-blue-400 text-xs" for="toggle_new_brand">Ajouter une
                            marque</label>
                        <input class="sr-only" name="toggle_new_brand" type="checkbox"
                               id="toggle_new_brand" {{ old('add_new_brand') != '' ? 'checked':'' }}>
                        <div class="new_brand">
                            <label for="add_new_brand" class="sr-only">Ajouter nouvelle marque</label>
                            <input
                                class="grow border-gray-500 border rounded-md  @error('add_new_brand') border-red-400 @enderror"
                                type="text" name="add_new_brand" id="add_new_brand" placeholder="Kinder"
                                value="{{ old('add_new_brand') != '' ? old('add_new_brand') : '' }}">
                        </div>
                        <x-form.error-message field="add_new_brand"/>
                    </div>
                </div>
                {{-- Sélection multiple d'une sous-catégorie existante --}}
                <div class="col-span-full">
                    <div class="flex flex-col">
                        <label for="subcategories" class="col-start-1 ml-2 bg-white px-2 -mb-2 z-1 text-sm uppercase max-w-max @if($errors->has('subcategories')) text-error @else text-black @endif">
                            Sous-catégories
                        </label>
                        <select class="px-1.5 py-2 select-one-toggle border rounded-md outline-none focus:border-primary-dark @if($errors->has('subcategories')) border-error @else border-black @endif"
                                name="subcategories[]" id="subcategories" multiple>
                            @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                        <x-form.error-message field="subcategories"/>
                    </div>
                    {{--Ajouter une nouvelle sous-catégorie--}}
                    <div>
                        <label class="underline text-blue-400 text-xs" for="toggle_new_subcategories">
                            Ajouter des nouvelles sous-catégories
                        </label>
                        <input class="sr-only" name="toggle_new_subcategories" type="checkbox"
                               id="toggle_new_subcategories" {{ old('add_new_subcategories') != '' ? 'checked':'' }}>
                        <div class="new_subcategories">
                            <label for="add_new_subcategories" class="sr-only">Ajouter nouvelle marque</label>
                            <input
                                class="grow border-gray-500 border rounded-md  @error('add_new_subcategories') border-red-400 @enderror"
                                type="text" name="add_new_subcategories" id="add_new_subcategories"
                                placeholder="Pétillant, Non-pétillant, ..."
                                value="{{ old('add_new_subcategories') != '' ? old('add_new_subcategories') : '' }}">
                        </div>
                        <x-form.error-message field="add_new_subcategories"/>
                    </div>
                </div>
                <x-form.input label="Nom" name="name" type="text" placeholder="Coca-cola" class="col-span-2"/>
                <x-form.input label="Prix" name="price" type="text" placeholder="4,95"/>
                <x-form.input label="Nombre de produits" name="number" type="number" min="1" placeholder="6"/>
                <x-form.input label="Quantité du produit" name="quantity" type="number" min="1" placeholder="33(cl), 1,5(l), 100(ml)"/>
                <x-form.input label="Unité de mesure" name="unity" type="text" placeholder="ml, l, g, kg, cl,..."/>

                {{--Charger une image --}}
                <x-form.input label="Image" name="image" type="file" placeholder="6" class="col-span-full" value="{{ old('image') != '' ? old('image') : '' }}"/>

                {{--Bouton d'envoie--}}
                <x-form.button class="col-span-full">Ajouter</x-form.button>
            </form>
        </div>
    </x-slot>
</x-layout>
