<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl px-5 mx-auto">
            <div class="relative max-w-xs mx-auto py-5">
                <div class="bg-white text-center absolute right-0 top-1/3 rounded-l-md px-2">
                    <p class="font-lato-bold text-2xl">{{$product->price}}€</p>
                    <p class="">{{$product->number}}<span class=""> x </span>{{$product->quantity}}{{$product->unity}}
                    </p>
                </div>
                <img class="mx-auto mb-5 max-w-[150px]" src="{{asset('storage/'.$product->image)}}"
                     alt="{{$product->name}}">
                <a href="/marques/{{$product->brand->slug}}"
                   class="px-5 hover:underline font-raleway-medium">{{$product->brand->name}}</a>
                <h1 class="px-5 uppercase text-3xl font-raleway-black tracking-wide">{{$product->name}}</h1>
                <div class="mx-5 mt-1 flex flex-nowrap overflow-y-scroll gap-2">
                    @foreach($product->subcategories as $subcategory)
                        <a href="/categories/{{$subcategory->slug}}"
                           class="font-raleway-regular uppercase tracking-wide text-xs border-black border rounded px-2 py-1 hover:text-white hover:bg-black duration-150 whitespace-nowrap">{{$subcategory->name}}</a>
                    @endforeach
                </div>
                <div class="absolute bottom-0 -z-1 w-full">
                    <div
                        class="mx-auto max-w-xs bg-primary-regular relative w-full aspect-square rounded-lg overflow-hidden">
                        <svg class="scale-110 absolute top-0 left-0 h-full w-full object-cover"
                             xmlns="http://www.w3.org/2000/svg" width="386.001" height="386" viewBox="0 0 386.001 386">
                            <path id="Intersection_5" data-name="Intersection 5"
                                  d="M141.212,260.718C120.937,197.761,82.8,116.574,0,122.733V-.923a16,16,0,0,1,16-16H155.307c38.787,19.949,69.348,50.456,84.037,83.879,26.059,59.3,70.18,134.4,146.657,138.53V349.874c-27.856,13.362-55.749,19.2-82.3,19.2C226,369.072,159.974,318.978,141.212,260.718Z"
                                  transform="translate(386 369.076) rotate(180)" fill="#ffe8b9"/>
                        </svg>
                    </div>
                </div>
            </div>
            {{-- ADD TO CART--}}
            <form action="" class="w-full max-w-xs mx-auto mt-2.5 mb-10">
                <x-form.button class="w-full">Ajouter</x-form.button>
            </form>
            {{-- PARTIAL --}}
            @include('parts.single.information')
            {{-- SIMILAR PRODUCT --}}
            @include('parts.single.similar')
        </div>

    </x-slot>
</x-layout>
