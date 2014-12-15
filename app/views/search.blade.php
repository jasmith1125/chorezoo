@extends('_master')

@section('title')
	Search (Ajax)
@stop

@section('content')
<div id="longer_page" class="row">
   <div class="large-8 large-centered columns">
	<h2>Search Chores by Tag</h2>

<!-- show all the tag options -->


{{ Form::open(array('url' => '/search')) }}

        @foreach($tags as $id => $tag)
            {{ Form::radio('tags[]', $id); }} {{ $tag }}
        @endforeach

        {{ Form::submit('Search'); }}

    {{ Form::close() }}
    </div>
    </div>

@stop

 @secion('/body')
 
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  <script>
    $(document).foundation();
  </script>
@stop
