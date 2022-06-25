@extends('layouts.front')

@section('title', 'Aktivitas')

@section('content')
    @include('partials._breadcrumb', ['secondText' => 'Aktivitas'])

    <div class="row">
        <div class="col-md-8 col-lg-8 order-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <iframe width="560" height="560" src="https://www.youtube.com/embed/ClMX6TXvh_o"
                        title="YouTube video player" frameborder="0" class="w-100"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 order-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($course->events as $link)
                            <a href="{{ route('student.single', $link) }}" class="list-group-item list-group-item-action {{ $link->id == $event->id ? 'active' : '' }}">{{ $link->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
