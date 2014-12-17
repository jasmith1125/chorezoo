@extends('_master')

@section('title')
   Edit Your Chore
@stop

@section('content')
<div class="row">
    <div class="large-8 large-centered columns">
        <h3>Edit Chore Description <small>Be sure to check &ldquo;completed&rdquo; when your chore is done!</small></h3>
     

    <form action="{{ action('ChoreController@postEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $chore->id }}">

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $chore->description }}" />
        </div>
        <div class="checkbox">
            <label for="completed">
              <input type="checkbox" name="completed" {{ $chore->completed ? 'checked' : '1', null }} /> Completed? 
            </label>
<div class="row">  
<div class="large-12large-centered columns">
<h5 small>Add tags to your chore so you can search chores by category</h5 small>
        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }}&nbsp;&nbsp;&nbsp; 
        @endforeach
        <br><br>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-link">Cancel</a>
    </form>
   
</div></div>

    </div>
    </div>
    </div>


@stop