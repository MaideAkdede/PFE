<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">

        <h1 class="text-3xl font-bold underline text-primary">
            {{$product->name}}
        </h1>
        <div class="">
                <article class="flex gap-2">
                    <a class="block bg-primary hover:bg-black text-white uppercase text-xs bg-white rounded-full px-2.5 py-2 my-2" href="/marques/{{$product->brand->slug}}">{{$product->brand->name}}</a>
                    <a class="block bg-primary hover:bg-black text-white uppercase text-xs bg-white rounded-full px-2.5 py-2 my-2" href="/{{$product->category->slug}}s/">{{$product->category->name}}</a>
                </article>
        </div>
    </x-slot>
</x-layout>
