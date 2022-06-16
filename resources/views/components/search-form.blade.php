<form action="/recherche" method="get" {{$attributes(['class'=>'relative mb-8 px-5'])}}>
    <label for="search" class="sr-only">Rechercher</label>
    <input class="w-full border border-black pl-5 pr-14 py-2.5 text-lg rounded-md" id="search" type="text" name="recherche"
           placeholder="ex: fanta">
    <button class="absolute top-1/2 -translate-y-1/2 right-6 bg-black fill-white p-2 h-[42px] w-[42px] aspect-square rounded-lg">
        <span class="sr-only">rechercher</span>
        <svg class="h-full w-full object-contain">
            <use xlink:href="#search"></use>
        </svg>
    </button>
</form>
