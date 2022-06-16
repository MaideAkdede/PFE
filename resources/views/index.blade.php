<x-layout>
    <x-slot name="title">
        Réserver des boissons & des snacks en lot
    </x-slot>
    <x-slot name="content">
        <div
            class="relative min-h-90vh bg-primary-regular bg-texture bg-center bg-blend-soft-light bg-no-repeat bg-cover grid place-content-center overflow-hidden sm:z-1">
            <div class="relative">
                <h1 class="font-raleway-black text-3xl md:text-5xl uppercase text-center px-5">
                    Réservez vos
                    <a href="/boissons" class="text-5xl md:text-7xl stroked block mt-2 -mb-2">boissons</a>
                    &
                    <a href="/snacks" class="text-5xl md:text-7xl stroked block mb-2 -mt-2">snacks</a>
                    en lot dès maintenant
                </h1>
                <img src="{{asset('images/header/snack.png')}}" alt="Photo d'oreo"
                     class="sm:-z-1 move absolute -top-[45vh] -left-[25vw]">
                <img src="{{asset('images/header/drink.png')}}" alt="Photo d'une canette Fanta Orange"
                     class="sm:-z-1 absolute move-two -bottom-[60vh] -right-[35vw]">
            </div>
            <svg class="absolute bottom-0 w-screen h-[75px]">
                <use xlink:href="#wave-header"></use>
            </svg>
        </div>
        <section class="max-w-7xl mx-auto px-5 mb-20">
            <x-title-secondary>Découvrez nos produits</x-title-secondary>
            <div class="xs:flex gap-5">
                <div class="xs:grow relative overflow-hidden rounded-md group p-2 flex flex-col gap-1.5">
                    <div class="mb-5 mx-auto h-thumbnail w-thumbnail overflow-hidden">
                        <img class="h-full object-contain scale-125"
                             src="{{asset('images/categories/cat-2.png')}}"
                             alt="">
                    </div>
                    <a href="/snacks" title="Voir tous les snacks"
                       class="flex justify-center items-center gap-3 uppercase bg-black fill-white border-2 border-black text-white hover:text-black hover:fill-black hover:bg-transparent p-2 rounded-md font-raleway-bold tracking-widest">
                        <span class="sr-only md:not-sr-only">Voir tous les</span>Snacks
                        <svg class="icon h-[25px] w-[25px]">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                    </a>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-3/4 rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
                <div class="xs:grow relative overflow-hidden rounded-md group p-2 flex flex-col gap-1.5">
                    <div class="mb-5 mx-auto h-thumbnail w-thumbnail overflow-hidden">
                        <img class="h-full object-cover"
                             src="{{asset('images/categories/cat-1.png')}}"
                             alt="">
                    </div>
                    <a href="/boissons" title="Voir toutes les boissons"
                       class="flex justify-center items-center gap-3 uppercase bg-black fill-white border-2 border-black text-white hover:text-black hover:fill-black hover:bg-transparent p-2 rounded-md font-raleway-bold tracking-widest">
                        <span class="sr-only md:not-sr-only">Voir toutes les</span>Boissons
                        <svg class="icon h-[25px] w-[25px]">
                            <use xlink:href="#arrow_down"></use>
                        </svg>
                    </a>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-3/4 rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-7xl mx-auto px-5 mb-20">
            <x-title-secondary>Nos derniers produits ajoutés</x-title-secondary>
            <div class="grid xs:grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-4">
                @foreach($products as $product)
                    <x-card :product="$product" :subcategories="$product->subcategories"/>
                @endforeach
            </div>
        </section>
        <section class="max-w-7xl mx-auto px-5 mb-20" id="comment-ca-marche">
            <x-title-secondary>Comment ça marche ?</x-title-secondary>
            <div class="grid gap-5 xs:grid-cols-2 md:grid-cols-4 w-full sm:justify-start">
                <div
                    class="relative grow xs:shrink overflow-hidden rounded-md group p-2 flex flex-col justify-between items-center">
                    <h3 class="font-lato-black uppercase tracking-wider">Étape 1</h3>
                    <img src="{{asset('images/steps/step-1.png')}}" alt="">
                    <p class="font-raleway-regular text-center">Choisissez vos produits et ajoutez les dans votre
                        panier</p>
                    <div
                        class="absolute grow bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-full rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
                <div
                    class="relative grow overflow-hidden rounded-md group p-2 flex flex-col justify-between items-center">
                    <h3 class="font-lato-black uppercase tracking-wider">Étape 2</h3>
                    <img src="{{asset('images/steps/step-2.png')}}" alt="">
                    <p class="font-raleway-regular text-center">Validez votre panier en choisissant une date qui vous
                        convient</p>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-full rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
                <div
                    class="relative grow overflow-hidden rounded-md group p-2 flex flex-col justify-between items-center">
                    <h3 class="font-lato-black uppercase tracking-wider">Étape 3</h3>
                    <img src="{{asset('images/steps/step-3.png')}}" alt="">
                    <p class="font-raleway-regular text-center">Attendez que votre commande soit validée et traitée</p>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-full rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
                <div
                    class="relative grow overflow-hidden rounded-md group p-2 flex flex-col justify-between items-center">
                    <h3 class="font-lato-black uppercase tracking-wider">Étape 4</h3>
                    <img src="{{asset('images/steps/step-4.png')}}" alt="">
                    <p class="font-raleway-regular text-center">La commande sera livré et vous payez à la livraison</p>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular w-full h-full rounded-md overflow-hidden">
                        <svg class="icon w-full h-full group-even:-scale-x-[1]">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-7xl mx-auto px-5">
            <h2 class="text-center font-raleway-black text-xl max-w-max mx-auto link-underline"><a href="/marques" title="Marques">Les marques disponibles</a></h2>
            <div class="">
                <ul class="max-w-7xl mx-auto grid justify-items-center gap-y-10 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                    @foreach($brands as $brand)
                        <li class="">
                            <a class="group link-underline" href="/marques/{{$brand->slug}}" title=" {{$brand->name}}">
                                <span class="sr-only"> {{$brand->name}}</span>
                                @if($brand->image == null)
                                    <div class="relative h-[50px] w-[75px] grid place-content-center">
                                        <svg
                                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75px] h-[50px] opacity-10">
                                            <use xlink:href="#logo-footer"></use>
                                        </svg>
                                        <span
                                            class="font-raleway-black uppercase xs:whitespace-nowrap text-lg">{{$brand->name}}</span>
                                    </div>
                                @else
                                    <div class="w-[150px] h-[150px]">
                                        <img class="h-full w-full object-contain"
                                             src="{{asset('storage/'.$brand->thumbnail)}}" alt="{{$brand->name}}">
                                    </div>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </x-slot>
</x-layout>
