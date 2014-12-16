@extends('_master')

@section('title')
	Sign Up
@stop

@section('content')
<div id="longer_page" class="row">
<div class ="large-5 large-centered columns">
<h3>Sign up</h3>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

    {{ Form::label('username') }}
    {{ Form::text('username') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}
    <small>Min 6 characters</small>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div></div>
@stop