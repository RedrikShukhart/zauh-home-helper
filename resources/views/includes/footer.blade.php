<footer class="py-3 mt-5 text-center">
    {{-- @auth --}}
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-body">Home</a></li>
        <li class="nav-item"><a href="{{ route('profile') }}" class="nav-link px-2 text-body">Profile</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body">Settings</a></li>
        <!-- text-body-secondary подсветит синим цветом ссылку-->
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body">About</a></li>
    </ul>
    {{-- @endauth --}}
    <!-- {{ ktHello()  }} -->
    <p class="text-center text-body-secondary">&copy; {{ __('made by Zauhovna') }}, {{ $date }}</p>
</footer>
