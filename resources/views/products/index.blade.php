<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <x-title>{{$title}}</x-title>
        @isset($subcategories)
            <div class="flex flex-nowrap overflow-y-scroll max-w-7xl mx-auto gap-4 text-sm mb-12">
                @foreach($subcategories as $subcategory)
                    <a href="/categories/{{$subcategory->slug}}" class="whitespace-nowrap first:ml-5 last:mr-5 uppercase border border-black font-lato-bold px-2.5 py-1 rounded duration-100 hover:bg-black hover:text-white">{{$subcategory->name}}</a>
                @endforeach
            </div>
        @else
            <div class="flex flex-nowrap overflow-y-scroll max-w-7xl whitespace-nowrap mx-auto gap-4 text-sm px-5 mb-12">
                @foreach($all_subcategories as $sub)
                    <a href="/categories/{{$sub->slug}}" class="@if($subcategory->id === $sub->id) bg-black text-white order-first @else bg-white @endif uppercase border border-black font-lato-bold px-2.5 py-1 rounded duration-100 hover:bg-black hover:text-white">{{$sub->name}}</a>
                @endforeach
            </div>
        @endisset
        <div>
        </div>
        <div class="px-5 max-w-7xl mx-auto grid xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5 mb-10">
            @foreach($products as $product)
                <x-card :product="$product" :subcategories="$product->subcategories"/>
            @endforeach
        </div>
        {{ $products->links() }}
    </x-slot>
</x-layout>
