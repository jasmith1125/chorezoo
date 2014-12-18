@extends('_master')

@section('title')
   Edit Your Chore
@stop

@section('content')
<div class="row">
    <div class="large-8 large-centered medium-10 medium-centered small-11 small-centered columns">
        <h3>Edit Chore Description <small>Check &ldquo;completed&rdquo; when your chore is done!</small></h3>
     

    {{ Form::open(array('url' => '/edit')) }}
        <input type="hidden" name="id" value="{{ $chore->id }}">

            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $chore->description }}" />
    
            <label for="completed">
              <input type="checkbox" id="completed" name="completed" {{ $chore->completed ? 'checked' : '1', null }} /> Completed? 
            </label>
             
       
<h5>Add tags to your chore so you can search chores by category</h5>
    
        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }}&nbsp;&nbsp;&nbsp; 
        @endforeach
        <br><br>
        <input type="submit" value="Save" class="btn btn-primary" />&nbsp;&nbsp;&nbsp;
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-link">Cancel</a>
   {{ Form::close() }}
   <p>&nbsp;</p>
</div>
</div>


@stop