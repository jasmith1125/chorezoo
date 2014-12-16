@extends('_master')

@section('title')
   Add a Tag to Your Chore
@stop

@section('content')
<div id="longer_page" class="row">
    <div class="large-8 large-centered columns">
        <h3>Tag Chore <small>Then you will be able to search chores by category!</small></h3>
     

    <form action="{{ action('ChoreController@postTag') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $chore->id }}">

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $chore->description }}" />
        </div>
        
        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }} 
        @endforeach
        <br>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ChoreController@getAddTag') }}" class="btn btn-link">Cancel</a>
    </form>
    </div>
    </div>
    </div>


@stop