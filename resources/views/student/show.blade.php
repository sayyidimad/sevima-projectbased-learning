@extends('layouts.front')

@section('title', 'Aktivitas')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Aktivitas'])

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Aktivitas</h5>
        <div class="text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal dibuat</th>
                        <th>Tanggal diperbarui</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($course->events as $event)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger"></i>
                                <strong><a href="{{ route('student.single', $event) }}">{{ $event->name }}</a></strong>
                            </td>
                            <td>{{ $event->created_at }}</td>
                            <td>{{ $event->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

@endsection
