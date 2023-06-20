@props(['method' => 'GET', 'class' => ''])

@php($method = strtoupper($method))
@php($usingMethod = in_array($method, ['GET', 'POST']))

{{-- чтобы отработала форма PUT, то указываем при вызове компонента нужный нам put, но тут делаем проверку --}}
<form {{ $attributes }} method="{{ $usingMethod ? $method : 'POST' }}" enctype="multipart/form-data">
    <div {{ $attributes->class([
        $class
        ]) }}>

{{-- @unless = пока не --}}
        @unless($usingMethod)
            @method($method)
        @endunless

        @if($method != 'GET')
            @csrf
        @endif

        {{ $slot }}

    </div>
</form>