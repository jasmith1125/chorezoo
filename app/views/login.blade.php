@extends('_master')

@section('title')
	Log In
@stop

@section('content')
<div class="row">
<div class ="large-5 large-centered medium-6 medium-centered small-7 small-centered columns">
<h3>Log in</h3>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('username') }}
    {{ Form::text('username','Quinn') }}

    {{ Form::label('password') }} <span class="passhint">(quinn123)</span>
    {{ Form::password('password') }} 

    {{ Form::submit('Submit') }}

{{ Form::close() }}

<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
@stop