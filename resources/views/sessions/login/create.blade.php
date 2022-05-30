<x-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <x-slot name="content">
        <h1 class="text-3xl font-bold underline text-primary">
            {{$title}}
        </h1>
        <div class="">
            <form action="/connexion" method="POST">
                @csrf
                <x-form.input type="email" name="email" label="Adresse e-mail"/>
                <x-form.input type="password" name="password" label="Mot de passe"/>
                <x-form.button>Me connecter</x-form.button>
            </form>
        </div>
    </x-slot>
</x-layout>
