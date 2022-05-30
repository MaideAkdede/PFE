<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <h1 class="text-3xl font-bold underline text-primary">
            {{$brand->name}}
        </h1>
        <div class="">
            @foreach($brand->products as $product)
                <li>
                    <a href="/{{$product->category->slug}}s/{{$product->slug}}">{{$product->name}}</a>
                </li>
            @endforeach
        </div>
    </x-slot>
</x-layout>
