<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/images/favicon/favicon-16x16.png') }}">
    <title> {{ $title }} - Top Soda</title>
</head>
<body class="flex flex-col min-h-screen">
@include('inc.svgs')
@if(session()->has('success'))
    <div class="bg-black px-5 py-2.5 text-center success text-white">
        <p class="max-w-7xl mx-auto">{{ session('success') }}</p>
    </div>
@endif
<header class="px-5 py-2 sticky top-0 z-10 bg-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        {{-- BURGER MENU & NAVIGATION --}}
        <div>
            <input class="sr-only" name="menu_button" type="checkbox" id="menu_button">
            <label
                class="relative z-10 cursor-pointer block duration-150 hover:bg-primary-regular focus:bg-primary-regular p-2 rounded-md"
                tabindex="1"
                for="menu_button" id="menu_button_label">
                <span class="sr-only">Menu</span>
                <svg class="icon h-[23px] w-[35px] open">
                    <use xlink:href="#burger"></use>
                </svg>
                <svg class="hidden close icon h-[23px] w-[35px]">
                    <use xlink:href="#menu_close"></use>
                </svg>
            </label>
            {{-- NAVIGATION MENU --}}
            <nav id="menu"
                 class="-translate-x-full fixed overflow-y-scroll duration-200 top-0 left-0 bg-white h-full w-full grid place-content-start font-raleway-bold text-xl divide-y pt-20 uppercase z-5">
                {{-- SEARCH BAR IN MENU--}}
                <x-search-form class="w-full font-lato-regular"/>
                {{-- HOME LINK --}}
                <a class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline"
                   href="/"
                   title="Retourner à l'accueil de TOPSODA">Accueil</a>
                {{-- MENU ITEM IF AUTH USER --}}
                @auth()
                    <div class="menu-item">
                        <div class="relative">
                            <a class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline"
                               href="/mon-compte"
                               title="Accéder à l'administration">Mon compte</a>
                            <a href="/"
                               class="absolute z-2 top-1/2 -translate-y-1/2 right-5 bg-black block aspect-square w-[42] h-[42px] grid place-content-center rounded-md menu-item-button duration-150 fill-white">
                                <span class="sr-only">Sous-catégories de mon compte</span>
                                <svg class="icon h-[23px] w-[35px] arrow">
                                    <use xlink:href="#arrow_down"></use>
                                </svg>
                            </a>
                        </div>
                        <div
                            class="menu-item-child flex flex-col divide-y normal-case text-lg font-raleway-medium overflow-hidden transition-all ease-in-out duration-300">
                            {{-- Si utilisateur --}}

                            {{-- Si Administrateur --}}
                            @can('admin')
                                <a href="/admin"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">Administration</a>
                                <a href="/admin/produits/ajouter"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">Ajouter
                                    produit</a>
                                <a href="/admin/marques/ajouter"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">Ajouter
                                    une nouvelle marque</a>
                                <a href="/admin/sous-categories/ajouter"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">Ajouter
                                    une sous-catégorie</a>
                            @endcan
                            <form action="/deconnexion" method="POST">
                                @csrf
                                <button
                                    class="p-5 pl-10 text-error text-sm text-left w-screen block duration-100 hover:bg-primary-light hover:underline">
                                    Me déconnecter
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
                {{-- MENU ITEM 1 --}}
                <div class="menu-item">
                    <div class="relative">
                        <a class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline"
                           href="/boissons"
                           title="voir toutes les boissons">Boissons</a>
                        @if($drinks_subcategories->count())
                            <a href="/"
                               class="absolute z-2 top-1/2 -translate-y-1/2 right-5 bg-black block aspect-square w-[42] h-[42px] grid place-content-center rounded-md menu-item-button duration-150 fill-white">
                                <span class="sr-only">Sous-catégories des boissons</span>
                                <svg class="icon h-[23px] w-[35px] arrow">
                                    <use xlink:href="#arrow_down"></use>
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if($drinks_subcategories)
                        <div
                            class="menu-item-child flex flex-col divide-y normal-case text-lg font-raleway-medium overflow-hidden transition-all ease-in-out duration-300">
                            @foreach($drinks_subcategories as $sub)
                                <a href="/categories/{{$sub->slug}}"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">{{$sub->name}}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="menu-item">
                    <div class="relative">
                        <a class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline"
                           href="/snacks"
                           title="voir tous les snacks">Snacks</a>
                        @if($snacks_subcategories->count())
                            <a href="/"
                               class="absolute z-2 top-1/2 -translate-y-1/2 right-5 bg-black block aspect-square w-[42] h-[42px] grid place-content-center rounded-md menu-item-button duration-150 fill-white">
                                <span class="sr-only">Sous-catégories des snacks</span>
                                <svg class="icon h-[23px] w-[35px] arrow">
                                    <use xlink:href="#arrow_down"></use>
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if($snacks_subcategories)
                        <div
                            class="menu-item-child flex flex-col divide-y normal-case text-lg font-raleway-medium overflow-hidden transition-all ease-in-out duration-300">
                            @foreach($snacks_subcategories as $sub)
                                <a href="/categories/{{$sub->slug}}"
                                   class="p-5 pl-10 w-screen block duration-100 hover:bg-primary-light hover:underline">{{$sub->name}}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <a href="/marques"
                   class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline">Marques</a>
                <a href="/contact" class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline">Contactez-nous</a>
                {{-- MENU ITEM TO SHOW IF NOT AUTH --}}
                @guest()
                    <a href="/connexion" class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline">Se
                        connecter</a>
                    <a href="/inscription"
                       class="p-5 w-screen block duration-100 hover:bg-primary-light hover:underline">S'inscrire</a>
                @endguest
            </nav>
        </div>
        {{-- LOGO SITE HOME --}}
        <a href="/" title="Top Soda - Page d‘accueil block">
            <span class="sr-only">TOP SODA ACCUEIL</span>
            <svg class="icon h-[60px] w-[80px]">
                <use xlink:href="#logo"></use>
            </svg>
        </a>
        {{-- CART AND ACCOUNT profile --}}
        <div class="relative">
            <div class="bg-black rounded-md flex items-center divide-x divide-white/60">
                <a href="/panier" title="accéder à mon panier"
                   class="px-3 py-1.5 fill-white hover:fill-primary-light active:fill-primary-regular focus:fill-primary-light relative">
                    <svg class="icon h-[25px] w-[26px]">
                        <use xlink:href="#cart"></use>
                    </svg>
                    <span class="sr-only">Panier</span>
                    @auth()
                        <span
                            class="absolute -top-1 right-2 block aspect-square w-[18px] h-[18px] bg-primary-dark rounded-full grid place-content-center text-xs">0</span>
                    @endauth
                </a>
                <a href="#" title="Mon compte"
                   class="account px-3 py-1.5 fill-white hover:fill-primary-light focus:fill-primary-light ">
                    <svg class="icon h-[20px] aspect-square">
                        <use xlink:href="#log"></use>
                    </svg>
                    <span class="sr-only">Mon compte</span>
                </a>
            </div>
            <div
                class="account-menu py-2.5 z-2 absolute top-full right-0 bg-white flex flex-col rounded-md before:content-[''] before:absolute before:border-solid before:bottom-full before:right-3 before:border-[10px] before:border-transparent before:border-b-white drop-shadow-lg min-w-max">
                @guest()
                    <a href="/connexion" class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Se
                        connecter</a>
                    <a href="/inscription"
                       class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">S'inscrire</a>
                @endguest
                @auth()
                    <a href="/mon-compte"
                       class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Mon compte</a>
                    @can('admin')
                        <a href="/admin"
                           class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Administration
                        </a>
                        <a href="/admin/produits/ajouter"
                           class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Ajouter produit
                        </a>
                        <a href="/admin/marques/ajouter"
                           class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Ajouter marques
                        </a>
                        <a href="/admin/sous-categories/ajouter"
                           class="px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular">Ajouter sous-catégories
                        </a>
                    @endcan
                    <form action="/deconnexion" method="POST">
                        @csrf
                        <button
                            class="w-full text-left px-5 py-2.5 hover:bg-primary-regular focus:bg-primary-regular text-error">
                            Me déconnecter
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>
<main class="grow">
    {{ $content }}
</main>

<svg class="w-screen h-[75px] mt-20">
    <use xlink:href="#wave-footer"></use>
</svg>
<footer class="bg-black text-white">
    <div class="mx-auto max-w-7xl px-5">
        <div class="flex justify-between mb-10">
            <a href="" class="fill-primary-regular hover:fill-primary-light focus:fill-primary-light">
                <svg class="w-[76px] h-[53px]">
                    <use xlink:href="#logo-footer"></use>
                </svg>
            </a>
            <div class="flex gap-3">
                <a href=""
                   class="bg-primary-regular inline-block w-[44px] h-[44px] p-2 rounded-md hover:bg-primary-light focus:bg-primary-light">
                    <svg class="h-full w-full">
                        <use xlink:href="#phone"></use>
                    </svg>
                </a>
                <a href=""
                   class="bg-primary-regular inline-block w-[44px] h-[44px] p-2 rounded-md hover:bg-primary-light focus:bg-primary-light">
                    <svg class="h-full w-full">
                        <use xlink:href="#facebook"></use>
                    </svg>
                </a>
                <a href=""
                   class="bg-primary-regular inline-block w-[44px] h-[44px] p-2 rounded-md hover:bg-primary-light focus:bg-primary-light">
                    <svg class="h-full w-full">
                        <use xlink:href="#whatsapp"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <h2 class="font-raleway-bold text-sm mb-4">Menu<span class="sr-only"> pied de page</span></h2>
            <ul class="font-lato-regular max-w-md grid grid-cols-2 grid-flow-row-dense gap-2">
                <li class="flex items-center gap-2 col-start-1">
                    <svg class="w-[20px] aspect-square">
                        <use xlink:href="#puce"></use>
                    </svg>
                    <a href="/boissons" class="link-underline">Boissons</a>
                </li>
                <li class="flex items-center gap-2 col-start-1">
                    <svg class="w-[20px] aspect-square">
                        <use xlink:href="#puce"></use>
                    </svg>
                    <a href="/snacks" class="link-underline">Snacks</a>
                </li>
                @guest()
                    <li class="flex items-center gap-2 col-start-2">
                        <svg class="w-[20px] aspect-square">
                            <use xlink:href="#puce"></use>
                        </svg>
                        <a href="/connexion" class="link-underline">Se connecter</a>
                    </li>
                    <li class="flex items-center gap-2 col-start-2">
                        <svg class="w-[20px] aspect-square">
                            <use xlink:href="#puce"></use>
                        </svg>
                        <a href="/inscription" class="link-underline">S'inscrire</a>
                    </li>
                @endguest
                @auth()
                    <li class="flex items-center gap-2 col-start-2">
                        <svg class="w-[20px] aspect-square">
                            <use xlink:href="#puce"></use>
                        </svg>
                        <a href="/mon-compte" class="link-underline">Mon compte</a>
                    </li>
                @endauth
                @can('admin')
                    <li class="flex items-center gap-2 col-start-2">
                        <svg class="w-[20px] aspect-square">
                            <use xlink:href="#puce"></use>
                        </svg>
                        <a href="/admin" class="link-underline">Administration</a>
                    </li>
                @endcan
                <li class="flex items-center gap-2 col-start-2">
                    <svg class="w-[20px] aspect-square">
                        <use xlink:href="#puce"></use>
                    </svg>
                    <a href="/contact" class="link-underline">Contactez-nous</a>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-[20px] aspect-square">
                        <use xlink:href="#puce"></use>
                    </svg>
                    <a href="/#comment-ca-marche" title="" class="link-underline">Comment réserver ?</a>
                </li>
            </ul>
        </div>
        <p class="text-xs text-zinc-400 text-center py-3 mt-10">&copy; TopSoda - 2020-2021</p>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
