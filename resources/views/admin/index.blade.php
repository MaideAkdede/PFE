<x-layout>
    <x-slot name="title">
        Administration
    </x-slot>
    <x-slot name="content">
            <x-title>
                Administration
            </x-title>
        <div class="">
            <div class="relative h-[200px] aspect-square rounded-md overflow-hidden">
                <a href="/admin/produits/" title="Voir tous les produits" class="bg-primary-regular h-full w-full block bg-wave bg-cover bg-no-repeat grid place-content-center font-raleway-black text-2xl uppercase hover:stroked">Produits</a>
                <a href="/admin/produits/ajouter" class="absolute bottom-0 right-0 bg-black h-[55px] aspect-square grid place-content-center text-5xl text-white hover:text-black hover:bg-primary-dark duration-100">+</a>
            </div>
        </div>
    </x-slot>
</x-layout>
