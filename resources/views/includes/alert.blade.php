{{-- @if(session()->has('alert')) можно и по другому сделать запись --}}
{{-- а чтобы получить данные из сесии один раз и потом удалить их из сессии используют метод pull --}}
{{-- @if($alert = session()->pull('alert'))
    @php($alertColor =  session()->pull('alertColor'))

    <div class="alert alert-{{ $alertColor }} mb-0 rounded-0 text-center small py-2">
        {{ $alert }}
    </div>
@endif --}}

@if(session()->has('alert', 'alertColor'))
    <div class="alert alert-{{ session()->pull('alertColor') }} mb-0 rounded-0 text-center small py-2">
        {{ session()->pull('alert') }}
    </div>
@endif
