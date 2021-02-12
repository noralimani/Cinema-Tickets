@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <form method="POST" enctype="multipart/form-data" action="{{ route('movies.update', $movie->id) }}"
                    class="card">
                    @csrf
                    @method('PATCH')
                    <div class="card-header"> Edit Movie </div>
                    @include('movie._form', ['movie' => $movie] )
                </form>
            </div>
        </div>
    </div>
@endsection
