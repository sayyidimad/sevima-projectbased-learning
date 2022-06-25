@props(['data', 'model'])

<div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route(($model . '.edit'), $data->id) }}"><i class="bx bx-edit-alt me-1"></i>
            Edit</a>
        <form action="{{ route($model . '.delete', $data->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
        </form>
    </div>
</div>
