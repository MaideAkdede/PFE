<x-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <x-slot name="content">
        <div class="shadow-[0px_2px_18px_0px_rgba(6,154,181,0.5)] text-center my-10 md:max-w-md px-5 pt-10 pb-14
         rounded-lg mx-5 md:mx-auto">
            <h1 class="text-3xl font-medium mb-8">
                {{$title}}
            </h1>
            <div class="">
                <form action="/connexion" method="POST" class="flex flex-col gap-5">
                    @csrf
                    <x-form.input type="email" name="email" label="Adresse e-mail"/>
                    <x-form.input type="password" name="password" label="Mot de passe"/>
                    <a href="/mot-de-passe" class="text-xs text-right text-zinc-600 -mt-3 mb-3">Mot de passe oublié ?</a>
                    <x-form.button class="">Me connecter</x-form.button>
                </form>
                <p class="mt-5 text-xs text-zinc-600">Vous n'êtes pas encore inscrit ? <a href="/inscription" class="link">Je m'inscris</a></p>
            </div>
        </div>
    </x-slot>
</x-layout>
