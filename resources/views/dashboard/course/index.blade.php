@extends('layouts.dashboard')

@section('title', 'Pelajaran')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Pelajaran'])

    {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
    <a href="{{ route('course.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Tambahkan</a>

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Pelajaran</h5>
        <div class="text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tanggal dimulai</th>
                        <th>Tanggal berakhir</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger"></i>
                                <strong>{{ $course->category }}</strong></td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            <td>
                                <x-table-action :data="$course" :model="'course'" :withDetail="true" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

@endsection
