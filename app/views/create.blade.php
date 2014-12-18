@extends('_master')

@section('title')
   Create a New Chore
@stop

@section('content')

<div class="row">
    <div class="large-8 large-centered medium-10 medium-centered small-11 small-centered columns">
        <h3>Create Chore</h3>

   {{ Form::open(array('url' => '/create')) }}

        {{ Form::label('description','Description') }}
        {{ Form::text('description'); }}
        
  <div id="space_above">      
    <span class="h5 small">Add tags to your chore so you can search chores by category</span><br>
        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }} &nbsp;&nbsp;&nbsp; 
        @endforeach
      <br><br>
        {{ Form::submit('Create'); }}
        </div>
    {{ Form::close() }}
    <p>&nbsp;</p>
    
    </div>
    </div>
        
    
@stop

