@extends('_master')

@section('content')

<div class="row">
    <div class="large-12 columns">
        <h2>Create Chore</h2>

        

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
    </div>
    </div>
    </div>
        
    
@stop

