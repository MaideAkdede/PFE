<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <h1 class="text-3xl font-bold underline text-primary">
            {{ $title }}
        </h1>
        <div class="">
            @foreach($products as $product)
                <article class="">
                    <h2 class="inline underline"><a href="{{$route}}{{$product->slug}}">{{$product->name}}</a></h2>
                    <p>{{$product->brand->name}}</p>
                    <p class="inline uppercase text-xs bg-white rounded-full px-2.5">{{$product->category->name}}</p>
                </article>
            @endforeach
        </div>
        {{ $products->links() }}
    </x-slot>
</x-layout>
