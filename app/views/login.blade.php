@extends('_master')

@section('title')
	Log In
@stop

@section('content')
<div id="longer_page" class="row">
<div class ="large-5 large-centered columns">
<h2>Log in</h2>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('username') }}
    {{ Form::text('username','Quinn') }}

    {{ Form::label('password') }} (quinn123)
    {{ Form::password('password') }} 

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div></div>
@stop