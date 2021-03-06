<x-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="content">
        <x-admin-back/>
        <div class="my-10 md:max-w-xl px-5 pt-10 pb-14 rounded-lg mx-5 md:mx-auto border border-primary-dark">
            <x-title>
                {{$title}}
            </x-title>
            @if(session()->has('message'))
                <div class="bg-green-200 py-2 text-center rounded font-lato-bold mb-6">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <form class="flex flex-col gap-y-6 sm:grid" action="/admin/sous-categories/ajouter" method="POST">
                @csrf
                <x-form.input label="Nom" name="name" type="text" placeholder="The Coca-cola" class="col-span-full"/>
                <x-form.select label="Catégorie" name="category_id" class="col-span-full">
                    @foreach($categories as $category)
                        <option
                            value=" {{$category->id}}" {{ old('category_id') == $category->id ? 'selected':'' }}>{{$category->name}}</option>
                    @endforeach
                </x-form.select>
                {{--Bouton d'envoie--}}
                <x-form.button class="col-span-full">Ajouter</x-form.button>
            </form>
        </div>
    </x-slot>
</x-layout>
