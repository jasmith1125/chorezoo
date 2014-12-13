@extends('_master')

@section('content')

<div class="row">
    <div class="large-10 columns">
        <h1>Create Chore</h1>
    </div>
    </div>

    <div class="row">
        <div class="large-12 columns">

        <h5 small>Add tags to your chore so you can search chores by category</h5 small>
<!--{{ Form::open(array('url' => '/chart')) }}
  {{ Form::radio('homework')}}{{ Form::label('homework', 'Homework', array('class' => 'awesome')) }}
    {{ Form::radio('housework')}}{{ Form::label('housework', 'Housework', array('class' => 'awesome')) }}
 {{ Form::radio('event')}}{{ Form::label('event', 'Event', array('class' => 'awesome')) }}
 {{ Form::radio('top_priority')}}{{ Form::label('top_priority', 'Top Priority', array('class' => 'awesome')) }} 
 {{ Form::radio('community_service')}}{{ Form::label('community_service', 'Community Service', array('class' => 'awesome')) }} 
 {{ Form::radio('fun_stuff')}}{{ Form::label('fun_stuff', 'Fun Stuff', array('class' => 'awesome')) }} 

    <div class="row">
        <div class="large-10 columns">
   
    <form action="{{ action('ChoreController@handleCreate') }}" method="post" role="form">
            <label for="title">Description</label>
            <input type="text" name="description" />
        
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-link">Cancel</a>
   {{ Form::close() }} -->


<div class="row">
        <div class="large-10 columns">
   {{ Form::open(array('url' => '/create')) }}

        {{ Form::label('title','Description') }}
        {{ Form::text('description'); }}

        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }}
        @endforeach

        {{ Form::submit('Create'); }}

    {{ Form::close() }}

    </div>
    </div>
        
    
@stop