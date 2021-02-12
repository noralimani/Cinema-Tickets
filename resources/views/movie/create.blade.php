@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <form method="POST" enctype="multipart/form-data" action="{{ route('movies.store') }}" class="card">
                    @csrf
                    @method('POST')
                    <div class="card-header"> Create Movie </div>
                    @include('movie._form', ['movie' => new App\Models\Movie] )
                </form>
            </div>

        </div>
    </div>
@endsection
