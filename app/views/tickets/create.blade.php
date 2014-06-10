@extends('layouts.main')

@section('content')
    <h1>Create your ticket</h1>

    <div class="row">
        {{ Form::open(['route' => 'tickets.store']) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            <select name="tags[]" id="tags" multiple="multiple" class="form-control">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        {{ Form::submit("Create Ticket", ["class" => "btn btn-primary"]) }}

        {{ Form::close() }}
    </div>

    <div class="row">
        <br/>
        {{ HTML::linkRoute("tickets.index", "back to list", null, ["class" => "btn btn-default"]) }}
    </div>
@stop