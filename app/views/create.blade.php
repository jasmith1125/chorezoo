@extends('_master')

@section('content')

<div class="row">
    <div class="large-10 columns">
        <h1>Create Chore</h1>
    </div>
    </div>

    <div class="row">
        <div class="large-10 columns">
    <form action="{{ action('ChoreController@handleCreate') }}" method="post" role="form">
            <label for="title">Description</label>
            <input type="text" name="description" />
        
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-link">Cancel</a>
    </form>
    </div>
    </div>
@stop