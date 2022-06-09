@props(['name', 'label'])
<div {{$attributes(['class'=>'flex flex-col text-left'])}} >
    <label class="ml-2 bg-white rounded-md px-2 -mb-2 z-1 text-primary-regular text-sm uppercase max-w-max"
        for="{{ $name }}">{{ $label }}</label>
    <input class="@error($name) border-error @enderror border-primary-regular px-4 py-2 bg-white focus:border-primary-dark focus:shadow-md focus:shadow-primary-dark/20 border rounded-md outline-none"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value'=> old( $name )]) }}
    >
    <x-form.error-message field="{{ $name }}"/>
</div>
