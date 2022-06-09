@props(['name', 'label'])
<div {{$attributes(['class'=>''])}}>
    <label
        for="{{ $name }}">{{ $label }}</label>
    <select class="border-gray-500 border rounded-md  @error($name) not-valid @enderror"
            name="{{ $name }}" id="{{ $name }}" {{$attributes}}>
        {{$slot}}
    </select>
    <x-form.error-message field="{{ $name }}"/>
</div>
