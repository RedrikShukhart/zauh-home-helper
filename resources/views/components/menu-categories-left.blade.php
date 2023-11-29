@php
function printTree($categories, $btn_size = '', $collapse = 'col')
{
    foreach ($categories as $cat) {
        @endphp
            <li class="mb-1">
        @php
            if (isset($cat->child)) {
                $collapse .= Str::random(3)
                @endphp
                    <button 
                        class="btn btn-toggle {{ $btn_size }} d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ $collapse }}-collapse"
                        aria-expanded="false"
                    >
                        {{ $cat->short_name }}
                    </button>

                    <div class="collapse" id="{{ $collapse }}-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            @php 
                                printTree($cat->child, 'btn-sm', $collapse) 
                            @endphp
                        </ul>
                    </div>
                @php
            } else {
                $href = route($cat->folder_name, $cat->route_name);
            @endphp
                <li>
                    <a href="{{$href}}" class="link-dark d-inline-flex text-decoration-none rounded">
                        {{ $cat->short_name }}
                    </a>
                </li>

            @php
            }
        @endphp
            </li>
        @php
    }
}
@endphp

@php(printTree($categories))
