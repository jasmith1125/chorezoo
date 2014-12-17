@extends('_master')

@section('title')
   Create a New Chore
@stop

@section('content')

<div class="row">
    <div class="large-8 large-centered columns">
        <h3>Create Chore</h3>

        

   {{ Form::open(array('url' => '/create')) }}

        {{ Form::label('title','Description') }}
        {{ Form::text('description'); }}
        
  <div id="space_above">      
    <h5 small>Add tags to your chore so you can search chores by category</h5 small>
        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }} 
        @endforeach
        <br>
        {{ Form::submit('Create'); }}

    {{ Form::close() }}
    <p>&nbsp;</p>
    </div>
    </div>
    </div>
        
    
@stop

