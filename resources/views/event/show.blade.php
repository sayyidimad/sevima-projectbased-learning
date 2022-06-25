@extends('layouts.dashboard')

@section('title', 'Aktivitas')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Aktivitas'])

    <a href="{{ route('event.create', $course) }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Tambahkan</a>

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Aktivitas</h5>
        <div class="text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Tanggal diperbarui</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($course->events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger"></i>
                                <strong>{{ $event->type }}</strong>
                            </td>
                            <td>{{ $event->updated_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('event.edit', [$event->course, $event]) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        {{-- <a class="dropdown-item" href="{{ route($model . '.show', $data) }}"><i
                                                class='bx bx-file-find'></i>
                                            Detail</a> --}}
                                        <form action="{{ route('event.delete', [$event->course, $event]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

@endsection
