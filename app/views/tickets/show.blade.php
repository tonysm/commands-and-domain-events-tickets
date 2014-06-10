@extends('layouts.main')

@section('content')
<h1>Describe a ticket</h1>
<h2>Título: {{ $ticket->title }}</h2>
<p>Description: {{ $ticket->description }}</p>

<h2>Tags</h2>
<ul>
    @foreach($ticket->tags as $tag)
    <li>{{ $tag->name }}</li>
    @endforeach
</ul>

<a href="/tickets">back to tickets list</a>
@stop