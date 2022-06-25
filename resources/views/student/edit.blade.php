@extends('layouts.dashboard')

@section('content')
    @include('partials._breadcrumb', ['firstText' => 'Siswa /', 'secondText' => 'Edit Siswa'])

    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <form action="{{ route('student.update', $student) }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Siswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}"
                                    id="basic-icon-default-fullname" />
                            </div>

                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-birth-date">Tanggal Lahir</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-birth-date" class="input-group-text"><i
                                        class='bx bxs-calendar'></i></span>
                                <input type="date" class="form-control" name="birth_date"
                                    value="{{ $student->birth_date }}" id="basic-icon-default-birth-date" />
                            </div>

                            @error('birth_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" id="basic-icon-default-email" class="form-control" name="email"
                                    value="{{ $student->user->email }}" />
                            </div>

                            @error('email')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-password">Password</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-password" class="input-group-text"><i
                                        class='bx bx-key'></i></span>
                                <input type="password" class="form-control" name="password"
                                    id="basic-icon-default-password" />
                            </div>

                            @error('password')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-password-confirmation">Konfirmasi
                                Password</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-password-confirmation" class="input-group-text"><i
                                        class='bx bx-key'></i></span>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="basic-icon-default-password-confirmation" />
                            </div>

                            @error('password_confirmation')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
