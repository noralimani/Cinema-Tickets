@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" style="height:400px; object-fit:cover;"
                            src="{{ asset('uploads/' . $movie->image) }}">
                        <div class="card-header">
                            <b>{{ $movie->title }}</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Director: {{ $movie->director }}</li>
                            <li class="list-group-item">Age: {{ $movie->age }}</li>
                            <li class="list-group-item">Year: {{ $movie->year }}</li>
                            <li class="list-group-item">Release Date: {{ $movie->release_date }}</li>
                            <li class="list-group-item">Price: {{ $movie->price }} MKD</li>
                        </ul>
                        <div class="card-footer d-flex justify-content-between">
                            @if ($movie->tickets()->exists())
                                <button type="button" class="btn btn-secondary">
                                    Sold Tickets <span class="badge badge-light">
                                        {{ $movie->tickets()->count() }}
                                    </span>
                                </button>
                            @endif
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
