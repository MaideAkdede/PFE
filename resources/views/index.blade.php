<x-layout>
    <x-slot name="title">
        Réserver Boissons & Snacks
    </x-slot>
    <x-slot name="content">
        <div class="relative min-h-90vh bg-primary-regular bg-texture bg-center bg-blend-soft-light bg-no-repeat bg-cover grid place-content-center overflow-hidden sm:z-1">
            <div class="relative">
                <h1 class="font-raleway-black text-3xl md:text-5xl uppercase text-center px-5">
                    Réservez vos
                    <a href="/boissons" class="text-5xl md:text-7xl stroked block mt-2 -mb-2">boissons</a>
                    &
                    <a href="/snacks" class="text-5xl md:text-7xl stroked block mb-2 -mt-2">snacks</a>
                    en lot dès maintenant
                </h1>
                <img src="{{asset('images/snack.png')}}" alt="" class="sm:-z-1 move absolute -top-[45vh] -left-[25vw]">
                <img src="{{asset('images/drink.png')}}" alt="" class="sm:-z-1 absolute move-two -bottom-[60vh] -right-[35vw]">
            </div>
            <svg class="absolute bottom-0 w-screen h-[75px]">
                <use xlink:href="#wave-header"></use>
            </svg>
        </div>

    </x-slot>
</x-layout>
