@extends('layouts.main')

@section('content')
    <h1>All tickets</h1>
    <p>
        {{ HTML::linkRoute("tickets.create","New ticket", null, ["class" => "btn btn-default"]) }}
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>
                    {{ HTML::linkRoute("tickets.show", $ticket->id, [$ticket->id]) }}
                </td>
                <td>
                    {{ HTML::linkRoute("tickets.show", $ticket->title, [$ticket->id]) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}
@stop