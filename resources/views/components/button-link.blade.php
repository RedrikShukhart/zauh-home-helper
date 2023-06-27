@props(['size' => ''])

<a {{ $attributes->class([
    "btn btn-dark mt-3", ($size ? "btn-{$size}" : ''),
])->merge([
    'href' => '#',
]) }}>
    {{ $slot }}
</a>
