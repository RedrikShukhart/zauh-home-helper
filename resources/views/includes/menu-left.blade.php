<aside class="flex-shrink-0 p-4 " style="width: 290px;">
  <ul class="list-unstyled ps-0">
      
  {{-- profile-settings part BEGIN --}}
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link link-dark d-inline-flex text-decoration-none rounded {{ activeLink('profile/1') }}" aria-current="page" 
          href="{{ route('profile', ['id' => 1]) }}">
            <span data-feather="home" class="align-text-bottom"></span>
            {{ __('Profile') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark d-inline-flex text-decoration-none rounded {{ activeLink('shop-list') }}" 
          href="{{ route('shop-list')}}">
            <span data-feather="file" class="align-text-bottom"></span>
            {{ __('Shopping list') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark d-inline-flex text-decoration-none rounded {{ activeLink('settings') }}" 
          href="{{ route('settings')}}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            {{ __('Settings') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark d-inline-flex text-decoration-none rounded" href="#">
            <span data-feather="users" class="align-text-bottom"></span>
            {{ __('Sign out') }}
          </a>
        </li>
      </ul>
    </div>
  {{-- profile-settings part END --}}

    <li class="border-top my-3"></li>

    {{-- categories-menu part BEGIN --}}

    <x-menu-categories-left />

    {{-- categories-menu part END --}}

  </ul>
</aside>
