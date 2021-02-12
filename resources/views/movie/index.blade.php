@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            @if (auth()->user()->isAdmin)
                <div class="col-12">
                    <a href="{{ route('movies.create') }}" class="btn btn-primary">Add new movie</a>
                </div>
            @endif
        </div>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" style="height:400px; object-fit:cover;"
                            src="{{ asset('uploads/' . $movie->image) }}">
                        <div class="card-body">
                            <a class="h4" href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }} </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Director: {{ $movie->director }}</li>
                            <li class="list-group-item">Age: {{ $movie->age }}</li>
                            <li class="list-group-item">Year: {{ $movie->year }}</li>
                            <li class="list-group-item">Release Date: {{ $movie->release_date }}</li>
                            <li class="list-group-item">Price: {{ $movie->price }} MKD</li>
                        </ul>
                        @if (auth()->user()->isAdmin)
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="card-link">Edit</a>

                                <x-form-button class="btn btn-outline-danger" method="delete"
                                    :action="route('movies.destroy', $movie->id)">
                                    Delete
                                </x-form-button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
