@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (!auth()->user()->isAdmin)
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        Thank you for purchasing, here is your ticket.
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <h1>Invoice for Ticket #{{ $ticket->id }}</h1>
                <div class="card">
                    <img class="card-img-top" src="{{ asset('uploads/' . $ticket->movie->image) }}">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Movie:</dt>
                            <dd class="col-sm-9">
                                <a href="{{ route('movies.show', $ticket->movie->id) }}">
                                    {{ $ticket->movie->title }}
                                </a>
                            </dd>

                            <dt class="col-sm-3">Price:</dt>
                            <dd class="col-sm-9"> {{ $ticket->total }}</dd>

                            <dt class="col-sm-3">Date:</dt>
                            <dd class="col-sm-9"> {{ $ticket->created_at }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
