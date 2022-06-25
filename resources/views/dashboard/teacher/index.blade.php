@extends('layouts.dashboard')

@section('title', 'Guru')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Guru'])

    {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
    <a href="{{ route('teacher.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Tambahkan</a>

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Guru</h5>
        <div class="text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal bergabung</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $teacher->name }}</strong>
                            </td>
                            <td>{{ $teacher->user->email }}</td>
                            <td>{{ $teacher->birth_date }}</td>
                            <td>{{ $teacher->join_date }}</td>
                            <td>
                                <x-table-action :data="$teacher" :model="'teacher'" :withDetail="false" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

@endsection
