@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img class="card-img-top" style="height:550px;" src="{{ asset('uploads/' . $movie->image) }}">
                    <div class="card-header">
                        <b>{{ $movie->title }}</b>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Director: {{ $movie->director }}</li>
                        <li class="list-group-item">Age: {{ $movie->age }}</li>
                        <li class="list-group-item">Year: {{ $movie->year }}</li>
                        <li class="list-group-item">Release Date: {{ $movie->release_date }}</li>
                        <li class="list-group-item">Price: {{ $movie->price }} MKD</li>
                        <li class="list-group-item">{{ $movie->description }}</li>
                    </ul>
                    @if (!auth()->user()->isAdmin)
                        <div class="card-footer">
                            <form method="GET" action="{{ route('tickets.create') }}">
                                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-danger">Buy</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
