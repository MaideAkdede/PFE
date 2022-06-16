<div>
    <div class="flex items-baseline justify-between flex-wrap">
    <x-title-secondary>Suggestions </x-title-secondary>
        <a href="/{{$product->category->slug}}s" class="uppercase text-xs text-primary-dark underline hover:text-black">voir tout</a>
    </div>
    <div class="flex flex-nowrap overflow-y-scroll">
        @foreach($similars as $product)
            <x-card :product="$product" :subcategories="$product->subcategories"/>
        @endforeach
    </div>
</div>
