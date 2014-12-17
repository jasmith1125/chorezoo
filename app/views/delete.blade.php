@extends('_master')

@section('title')
   Delete a Chore
@stop

@section('content')
	<div class="row">
    <div class="large-10 large-centered columns">
        <h3>Delete {{ $chore->description }} <small>Are you sure?</small></h3>
    
    <form action="{{ action('ChoreController@postDelete') }}" method="post" role="form">
        <input type="hidden" name="chore" value="{{ $chore->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-default">Cancel</a>
    </form>
    <p>&nbsp;</p>
     <p>&nbsp;</p>
</div>
</div>    
@stop

