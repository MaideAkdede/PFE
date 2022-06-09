<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <title> {{ $title }} - PFE</title>
</head>
<body class="flex flex-col min-h-screen">
<header class="px-5 py-7">
    <nav class="flex justify-between">
        <div>
            <a href="/boissons" class="text-xs uppercase font-bold underline">Boissons</a>
            <a href="/snacks" class="text-xs uppercase font-bold underline">Snacks</a>
            <a href="/marques" class="text-xs uppercase font-bold underline">Marques</a>
            @can('admin')
                <a href="/admin/produits/ajouter" class="text-xs uppercase font-bold underline">Ajouter produit</a>
            @endcan
            @guest()
                <a href="/inscription" class="text-xs uppercase font-bold underline">M'inscrire</a>
                <a href="/connexion" class="text-xs uppercase font-bold underline">Me connecter</a>
            @endguest
        </div>
        @auth()
            <div class="text-right">
                <p class="text-xs font-bold">Bonjour, {{ ucwords(auth()->user()->first_name); }}</p>
                <form action="/deconnexion" method="POST" class="">
                    @csrf
                    <button class="text-xs uppercase font-bold underline text-red-500">Me déconnecter</button>
                </form>
            </div>
        @endauth
    </nav>
</header>
<main class="grow">
    {{ $content }}
</main>
<footer class="">Footer</footer>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
