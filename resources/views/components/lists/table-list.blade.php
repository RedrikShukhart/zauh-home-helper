<div class="container">
<table class="table table-striped table-hover">
    <tbody>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">{{ $vars->title ?? '' }}</th>
          <th scope="col">{{ $vars->description ?? ''}}</th>
          <th scope="col"></th>
        </tr>
      </thead>

      @foreach ($content as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->title }}</td>
          <td>{{ $item->short_description }}</td>
          <td>
            <div class="d-flex flex-row">
              <i>{{-- удалить элемент --}}
                <form action="{{ route('table-list.delete', $item->id) }}" method="post" >
                  @method('DELETE')
                  @csrf
                  <button style="background: none; border: none;" class="bi bi-trash3 text-muted"  type="submit"></button> 
                </form>
              </i>
              <i>{{-- редактировать элемент 'time-cook' --}}
                <a class="bi bi-pencil-square text-muted" href="{{ route('table-list.edit', [$item->route_name, $item->id] ) }}"></a>
              </i>
            </div>
          </td>
        </tr>
      @endforeach
   </tbody>
  </table>
</div>