@props(['for' => '',  'required' => false])

{{-- $attributes->class - это так можно добавить классы --}}

<label {{ $for }} {{ $attributes->class([
    'col-sm-2 col-form-label', $required ? 'required' : ''
]) }}>
    {{ $slot }}
</label>