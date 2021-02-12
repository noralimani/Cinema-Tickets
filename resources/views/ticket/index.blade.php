@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ticket Holder</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Purchased</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <th scope="row">
                                    {{ $ticket->id }}
                                </th>
                                <td>
                                    {{ $ticket->user->name }}
                                </td>
                                <td>
                                    <a
                                        href="{{ route('movies.show', $ticket->movie->id) }}">{{ $ticket->movie->title }}</a>
                                </td>
                                <td>
                                    {{ $ticket->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $ticket->total }} MKD
                                </td>
                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}"
                                        class="btn btn-sm btn-outline-secondary">View Ticket</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
