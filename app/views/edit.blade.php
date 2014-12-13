@extends('_master')

@section('content')
<div class="row">
    <div class="large-10 columns">
        <h1>Edit Chore <small>Don't forget to check "completed" when your chore is done!</small></h1>
    

    <form action="{{ action('ChoreController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $chore->id }}">

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $chore->description }}" />
        </div>
        <div class="checkbox">
            <label for="completed">
                <input type="checkbox" name="completed" {{ $chore->completed ? 'checked' : '' }} /> Completed?
            </label>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ChoreController@getChart') }}" class="btn btn-link">Cancel</a>
    </form>
    </div>
    </div>
@stop