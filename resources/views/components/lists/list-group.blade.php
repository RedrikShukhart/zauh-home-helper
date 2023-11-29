@foreach($content as $link)
    <ul class="list-group list-group-flush">
        <a href="{{ route('link-list.show', [$link->route_name, $link->id]) }}" class="list-group-item">{{ $link->title }}</a>
    </ul>
@endforeach