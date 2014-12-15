@extends('_master')

@section('title')
   Delete a Chore
@stop

@section('content')
	<div id="longer_page" class="row">
    <div class="large-10 large-centered columns">
        <h2>Delete {{ $chore->description }} <small>Are you sure?</small></h2>
    
    <form action="{{ action('ChoreController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="chore" value="{{ $chore->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-default">Cancel</a>
    </form>
</div>
</div>    
@stop

