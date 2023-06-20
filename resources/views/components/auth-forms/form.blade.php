<form {{ $attributes }} enctype="multipart/form-data" method="POST">
    @csrf
    
    {{ $slot }}
</form>