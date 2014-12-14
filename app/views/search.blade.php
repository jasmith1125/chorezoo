@extends('_master')

@section('title')
	Search (Ajax)
@stop

@section('content')
<div class="row">
   <div class="large-12 columns">
	<h1>Search by Tag</h1>

<div class="row">
<!-- show all the tag options -->
{{ Form::open(array('url' => '/search')) }}

        @foreach($tags as $id => $tag)
            {{ Form::checkbox('tags[]', $id); }} {{ $tag }}
        @endforeach

        {{ Form::submit('Search'); }}

    {{ Form::close() }}
    </div></div>
@stop

 @secion('/body')
 
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  <script>
    $(document).foundation();
  </script>
@stop
