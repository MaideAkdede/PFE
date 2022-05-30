<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <h1 class="text-3xl font-bold underline text-primary">
            Ajouter un nouveau produit
        </h1>
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
        <form action="/admin/produits/ajouter" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input label="Nom" name="name" type="text" placeholder="Coca-cola"/>
            <x-form.input label="Prix" name="price" type="text" placeholder="4,95"/>
            <x-form.input label="img" name="price" type="text" placeholder="4,95"/>
            <x-form.input label="Nombre de produits" name="number" type="number" placeholder="6"/>
            <x-form.input label="Quantité du produit" name="quantity" type="number" placeholder="250"/>
            <x-form.input label="Unité de mesure" name="unity" type="text" placeholder="ml, l, g, kg, ..."/>
            <x-form.select label="Catégorie" name="category_id">
                @foreach($categories as $category)
                    <option
                        value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected':'' }}>{{$category->name}}</option>
                @endforeach
            </x-form.select>
            <x-form.select label="Marque" name="brand_id">
                @foreach($brands as $brand)
                    <option
                        value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' :'' }}>{{$brand->name}}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="Image" name="image" type="file" placeholder="6"/>
            <x-form.button>Ajouter</x-form.button>
        </form>
    </x-slot>
</x-layout>
