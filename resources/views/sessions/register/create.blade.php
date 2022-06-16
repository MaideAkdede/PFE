<x-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <x-slot name="content">
        <div class="text-center my-10 md:max-w-md px-5 pt-10 pb-14 rounded-lg mx-5 md:mx-auto border border-primary-dark">
            <h1 class="text-3xl font-raleway-black uppercase mb-8">
               Inscription
            </h1>
            <div class="">
                <form action="/inscription" method="POST" class="flex flex-col gap-5">
                    @csrf
                    <x-form.input type="text" name="first_name" label="Prénom" placeholder="Jane"/>
                    <x-form.input type="text" name="last_name" label="Nom" placeholder="Doe"/>
                    <x-form.input type="text" name="phone" label="Numéro de téléphone" placeholder="0412345456"/>
                    <x-form.input type="email" name="email" label="Adresse e-mail" placeholder="jane.doe@hotmail.com"/>
                    <x-form.input type="password" name="password" label="Mot de passe" placeholder="********"/>
                    <x-form.button>M'inscrire</x-form.button>
                </form>
                <p class="mt-5 text-xs text-zinc-600">Vous avez-déjà un compte ? <a href="/connexion" class="font-lato-bold font-bold link-underline">Me connecter</a></p>
            </div>
        </div>
    </x-slot>
</x-layout>
