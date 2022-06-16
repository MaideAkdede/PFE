<x-layout>
    <x-slot name="title">
        Administration
    </x-slot>
    <x-slot name="content">
            <x-title>
                Administration
            </x-title>
        <div class="max-w-max mx-auto px-5 grid xs:grid-cols-2 gap-5">
            <div class="relative max-h-[200px] aspect-square rounded-md overflow-hidden">
                <a href="/admin/produits/" title="Voir tous les produits" class="text-center bg-primary-regular h-full w-full block bg-wave bg-cover bg-no-repeat grid place-content-center font-raleway-black text-2xl uppercase hover:stroked">Produits</a>
                <a href="/admin/produits/ajouter" class="absolute bottom-0 right-0 bg-black h-[55px] aspect-square grid place-content-center text-5xl text-white duration-100 rounded-br-md hover:text-black hover:bg-white hover:border hover:border-black">+</a>
            </div>
            <div class="relative max-h-[200px] aspect-square rounded-md overflow-hidden">
                <a href="/admin/marques/" title="Voir toutes les marques" class="text-center bg-primary-regular h-full w-full block bg-wave bg-cover bg-no-repeat grid place-content-center font-raleway-black text-2xl uppercase hover:stroked">Marques</a>
                <a href="/admin/marques/ajouter" class="absolute bottom-0 right-0 bg-black h-[55px] aspect-square grid place-content-center text-5xl text-white duration-100 rounded-br-md hover:text-black hover:bg-white hover:border hover:border-black">+</a>
            </div>
            <div class="relative max-h-[200px] aspect-square rounded-md overflow-hidden">
                <a href="/admin/sous-categories/" title="Voir toutes les sous-catégories" class="bg-primary-regular h-full w-full block bg-wave bg-cover bg-no-repeat grid place-content-center text-center font-raleway-black text-2xl uppercase hover:stroked">Sous-catégories</a>
                <a href="/admin/sous-categories/ajouter" class="absolute bottom-0 right-0 bg-black h-[55px] aspect-square grid place-content-center text-5xl text-white duration-100 rounded-br-md hover:text-black hover:bg-white hover:border hover:border-black">+</a>
            </div>
        </div>
    </x-slot>
</x-layout>
