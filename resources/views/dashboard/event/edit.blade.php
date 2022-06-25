@extends('layouts.dashboard')

@section('content')
    @include('partials._breadcrumb', ['firstText' => 'Aktivitas /', 'secondText' => 'Tambahkan Aktivitas'])

    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            <form action="{{ route('event.update', [$course, $event]) }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Aktivitas</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-name">Nama Aktivitas</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-name" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ $event->name }}"
                                    id="basic-icon-default-name" />
                            </div>

                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-video">Video URL</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-video" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="url" class="form-control" name="video" value="{{ $event->video }}"
                                    id="basic-icon-default-video" />
                            </div>

                            @error('video')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Tugas</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="assignment" rows="3">{{ $event->assignment }}</textarea>

                            @error('assignment')
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
