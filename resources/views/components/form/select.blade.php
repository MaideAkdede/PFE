@props(['name', 'label'])
<div {{$attributes(['class'=>'flex flex-col'])}}>
    <label class="ml-2 bg-white px-2 -mb-2 z-1 text-sm uppercase max-w-max @if($errors->has($name)) text-error @else text-black @endif"
        for="{{ $name }}">{{ $label }}</label>
    <select class="grow border-gray-500 border rounded-md p-1.5 outline-none focus:border-primary-dark @error($name) not-valid @enderror"
            name="{{ $name }}" id="{{ $name }}" {{$attributes}}>
        {{$slot}}
    </select>
    <x-form.error-message field="{{ $name }}"/>
</div>
