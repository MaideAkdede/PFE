@props(['field'])

@error($field)
<p class="text-xs text-red-500">
    {{$message}}
</p>
@enderror
