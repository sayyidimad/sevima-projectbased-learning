@extends('layouts.dashboard')

@section('title', 'Siswa')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Siswa'])

    {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
    <a href="{{ route('student.create') }}" class="btn btn-primary mb-3"><i class='bx bx-plus'></i> Tambahkan</a>

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Siswa</h5>
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
                    @foreach ($students as $student)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $student->name }}</strong>
                            </td>
                            <td>{{ $student->user->email }}</td>
                            <td>{{ $student->birth_date }}</td>
                            <td>{{ $student->join_date }}</td>
                            <td>
                                <x-table-action :data="$student" :model="'student'" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

@endsection
