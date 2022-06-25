@extends('layouts.dashboard')

@section('content')
    @include('partials._breadcrumb', ['firstText' => 'Pelajaran /', 'secondText' => 'Tambahkan Pelajaran'])

    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <form action="{{ route('course.store') }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Pelajaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nama Guru</label>
                                <select class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" name="teacher_id">
                                    <option selected="">Pilih guru</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ $teacher->id == old('teacher_id') ? 'selected' : '' }}>
                                            {{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label" for="basic-icon-default-name">Nama Pelajaran</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-name" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="basic-icon-default-name" />
                            </div>

                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-category">Kategori</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-category" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" name="category" value="{{ old('category') }}"
                                    id="basic-icon-default-category" />
                            </div>

                            @error('category')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-start-date">Tanggal Dimulai</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-start-date" class="input-group-text"><i
                                        class='bx bxs-calendar'></i></span>
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ old('start_date') }}" id="basic-icon-default-start-date" />
                            </div>

                            @error('start_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-end-date">Tanggal Berakhir</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-end-date" class="input-group-text"><i
                                        class='bx bxs-calendar'></i></span>
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ old('end_date') }}" id="basic-icon-default-end-date" />
                            </div>

                            @error('end_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
@endsection
