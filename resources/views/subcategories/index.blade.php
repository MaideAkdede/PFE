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
                <p>{{$product->name}}</p>
            @endforeach
        </div>s
        {{ $products->links() }}
    </x-slot>
</x-layout>
