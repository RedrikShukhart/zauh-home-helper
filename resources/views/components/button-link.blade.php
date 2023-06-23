<div class="d-flex justify-content-end">
    <a class="btn btn-dark mt-3 " {{ $attributes->merge([
    'href' => '#',
    ]) }}>
        {{ $slot }}
    </a>
</div>
