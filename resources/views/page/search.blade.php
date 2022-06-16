<x-layout>
    <x-slot name="title">
        Page de recherche de : {{$request}}
    </x-slot>
    <x-slot name="content">
        <x-title> Vous avez chercher : <span class="italic">{{$request}}</span> <span class="font-lato-black">({{$total}})</span>
        </x-title>
        <x-search-form class="w-full max-w-xl mx-auto"/>
        @if($total > '0')
            @if($products->count())
                @foreach($products as $product)
                    <div class="max-w-7xl mx-auto px-5 grid xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                        <x-card :product="$product" :subcategories="$product->subcategories"/>
                    </div>
                @endforeach
            @endif
            @if($brands->count())
                @foreach($brands as $brand)
                    <div class="flex gap-10 flex-wrap max-w-7xl mx-auto px-5">
                        <a class="group link-underline" href="/marques/{{$brand->slug}}" title=" {{$brand->name}}">
                            <span class="sr-only"> {{$brand->name}}</span>
                            @if($brand->image == null)
                                <div class="relative h-[50px] w-[75px] grid place-content-center">
                                    <svg
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75px] h-[50px] opacity-10">
                                        <use xlink:href="#logo-footer"></use>
                                    </svg>
                                    <span
                                        class="font-raleway-black uppercase xs:whitespace-nowrap text-lg">{{$brand->name}}</span>
                                </div>
                            @else
                                <div class="w-[150px] h-[150px]">
                                    <img class="h-full w-full object-contain"
                                         src="{{asset('storage/'.$brand->thumbnail)}}" alt="{{$brand->name}}">
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach
            @endif
        @else
            <div class="max-w-7xl mx-auto px-5">

            <p class="my-4">Aucun élément ne correspond aux termes recherchés : <span class="italic">{{$request}}</span></p>
        <h2 class="font-lato-bold mb-4">Suggestions:</h2>
            <ul class="flex gap-1 items-center">
                <svg class="w-[20px] aspect-square">
                    <use xlink:href="#puce"></use>
                </svg> Vérifiez l'orthographe de la recherche
            </ul>
            <ul class="flex gap-1 items-center">
                <svg class="w-[20px] aspect-square">
                    <use xlink:href="#puce"></use>
                </svg> Essayez d'autres mots
            </ul>
            <ul class="flex gap-1 items-center">
                <svg class="w-[20px] aspect-square">
                    <use xlink:href="#puce"></use>
                </svg> Utilisez des mots-clés généraux
            </ul>
                <ul class="flex gap-1 items-center">
                <svg class="w-[20px] aspect-square">
                    <use xlink:href="#puce"></use>
                </svg> Recherchez avec moins de mots
            </ul>
            </div>

        @endif
    </x-slot>
</x-layout>
