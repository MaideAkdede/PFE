@props(['product', 'subcategories'])
<article class="relative overflow-hidden rounded-md group p-2 flex flex-col gap-1.5">
    {{-- Price Tag --}}
    <div class="bg-white text-center absolute right-0 top-1/3 rounded-l-md px-2">
        <p class="font-lato-bold text-2xl">{{$product->price}}€</p>
        <p class="">{{$product->number}}<span class=""> x </span>{{$product->quantity}}{{$product->unity}}
        </p>
    </div>
    {{--Thumbnail--}}
    <div class="mb-5 mx-auto h-thumbnail w-thumbnail overflow-hidden">
        <a href="/{{$product->category->slug}}s/{{$product->slug}}">
        <img class="h-full object-cover"
             src="@if(isset($product->image)){{asset('storage/'.$product->image)}}@else {{asset('/images/image-not-found.png')}}@endif"
             alt="{{$product->name}}">
        </a>
    </div>
    {{-- TAGS --}}
    @if($subcategories)
        <div class="flex flex-nowrap overflow-y-scroll gap-2">
            @foreach($subcategories as $category)
                <a href="/categories/{{$category->slug}}"
                   class="uppercase font-bold font-lato-bold text-xs border-black border rounded px-2 py-1 hover:text-white hover:bg-black duration-150 whitespace-nowrap">
                    {{$category->name}}
                </a>
            @endforeach
        </div>
    @endif
    {{-- Brand name--}}
    @if($product->brand)
        <a href="/marques/{{$product->brand->slug}}" class="duration-150 hover:underline text-sm">{{$product->brand->name}}</a>
    @endif
    {{--Product name --}}
    <h2 class="uppercase font-raleway-black tracking-wide line-clamp-1">
        <a href="/{{$product->category->slug}}s/{{$product->slug}}">
            {{$product->name}}
        </a>
    </h2>
    @if($product->out_of_stock)
        <p class="z-1 px-5 py-2 uppercase font-medium text-white tracking-widest rounded-lg overflow-hidden bg-zinc-500 text-center text-sm">Rupture de stock</p>
    @else
        <form action="">
            <button class="button-primary py-1 w-full">Ajouter</button>
        </form>
    @endif
    <div
        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-3/4 rounded-md overflow-hidden">
        <svg class="icon w-full h-full group-even:-scale-x-[1]">
            <use xlink:href="#wave"></use>
        </svg>
    </div>
</article>
