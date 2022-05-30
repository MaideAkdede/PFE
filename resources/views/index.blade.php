<x-layout>
    <x-slot name="title">
        This is the index page
    </x-slot>
    <x-slot name="content">
        @if(session()->has('success'))
            <p class="success bg-primary text-white text-bold">{{ session('success') }}</p>
        @endif
        <h1 class="counter text-3xl font-bold underline text-primary">
            {{ $title }}
        </h1>
        <h2>Boissons</h2>
        <div class="">
            @foreach($drinks as $drink)
                <article class="">
                    <h3 class="inline">{{$drink->name}}</h3>
                    <p class="inline uppercase text-xs bg-white rounded-full px-2.5">{{$drink->category->name}}</p>
                </article>
            @endforeach
        </div>
        <hr>
        <h2>Snacks</h2>
        <div class="">
            @foreach($snacks as $snack)
                <article class="">
                    <h3 class="inline">{{$snack->name}}</h3>
                    <p class="inline uppercase text-xs bg-white rounded-full px-2.5">{{$snack->category->name}}</p>
                </article>
            @endforeach
        </div>
    </x-slot>
</x-layout>
