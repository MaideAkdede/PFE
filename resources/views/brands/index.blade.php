<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <h1 class="text-3xl font-bold underline text-primary">
            {{ $title }}
        </h1>
        <div class="">
            @foreach($brands as $brand)
                <li>
                    <a class="underline" href="{{$route}}{{$brand->slug}}">
                        {{$brand->name}} <span class="">({{$brand->products->count()}})</span></a>
                </li>
            @endforeach
        </div>
    </x-slot>
</x-layout>
