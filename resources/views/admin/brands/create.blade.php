<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <div class="my-10 md:max-w-xl px-5 pt-10 pb-14 rounded-lg mx-5 md:mx-auto border border-primary-dark">
            <x-title>
                {{$title}}
            </x-title>
            @if(session()->has('message'))
                <div class="bg-green-200 py-2 text-center rounded font-lato-bold mb-6">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <form class="flex flex-col gap-y-6 sm:grid" action="/admin/marques/ajouter" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <x-form.input label="Nom" name="name" type="text" placeholder="The Coca-cola" class="col-span-full"/>

                {{--Charger une image --}}
                <x-form.input label="Image" name="image" type="file" placeholder="6" class="col-span-full"/>

                {{--Bouton d'envoie--}}
                <x-form.button class="col-span-full">Ajouter</x-form.button>
            </form>
        </div>
    </x-slot>
</x-layout>
