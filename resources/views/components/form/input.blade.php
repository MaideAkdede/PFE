@props(['name', 'label'])
<div class="">
    <label
        for="{{ $name }}">{{ $label }}</label>
    <input class="border-gray-500 border rounded-md  @error($name) not-valid @enderror"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value'=> old( $name )]) }}
    >
    <x-form.error-message field="{{ $name }}"/>
</div>
