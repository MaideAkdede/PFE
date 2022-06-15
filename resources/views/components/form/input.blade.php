@props(['name', 'label'])
<div {{$attributes(['class'=>'flex flex-col text-left'])}} >
    <label class="ml-2 bg-white px-2 -mb-2 z-1 text-sm uppercase max-w-max @if($errors->has($name)) text-error @else text-black @endif "
        for="{{ $name }}">{{ $label }}</label>
    <input class="border @if($errors->has($name)) border-error @else border-black @endif px-4 py-2 bg-white focus:border-primary-dark border rounded-md outline-none"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value'=> old( $name )]) }}
    >
    <x-form.error-message field="{{ $name }}"/>
</div>
