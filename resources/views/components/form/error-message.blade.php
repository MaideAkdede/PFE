@props(['field'])

@error($field)
<p class="text-xs text-error">
    {{$message}}
</p>
@enderror
