@props(['size' => ''])

<form {{ $attributes }} method="post" >
    @method('DELETE')
    @csrf

    <button  {{ $attributes->class([
        "btn btn-dark mt-3", ($size ? "btn-{$size}" : ''),
        ])}}  
        type="submit">
        {{ $slot }}
    </button> 
</form>