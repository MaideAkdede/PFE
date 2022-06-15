<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <x-title>{{$brand->name}}</x-title>
        <div class="px-5 max-w-7xl mx-auto grid xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5 mb-10">
            @foreach($products as $product)
                <x-card :product="$product" :subcategories="$product->subcategories" :route="$product->category->slug"/>
            @endforeach
        </div>
    </x-slot>
</x-layout>
