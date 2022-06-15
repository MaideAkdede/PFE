<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <x-title>
            MARQUES
        </x-title>
        <ul class="max-w-7xl mx-auto grid justify-items-center gap-y-10 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
            @foreach($brands as $brand)
                <li class="">
                    <a class="group link-underline" href="{{$route}}{{$brand->slug}}" title=" {{$brand->name}}">
                        <span class="sr-only"> {{$brand->name}}</span>
                        @if($brand->image == null)
                            <div class="relative h-[50px] w-[75px] grid place-content-center">
                                <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75px] h-[50px] opacity-10">
                                    <use xlink:href="#logo-footer"></use>
                                </svg>
                                <span class="font-raleway-black uppercase xs:whitespace-nowrap text-lg">{{$brand->name}}</span>
                            </div>
                        @else
                            <div class="w-[150px] h-[150px]">
                                <img class="h-full w-full object-contain" src="{{asset('storage/'.$brand->thumbnail)}}" alt="{{$brand->name}}">
                            </div>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </x-slot>
</x-layout>
