@extends('_master')

@section('content')
    <div class="large-10 columns">
        <h1>Delete {{ $chore->description }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('ChoreController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="chore" value="{{ $chore->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-default">Cancel</a>
    </form>

    
@stop

