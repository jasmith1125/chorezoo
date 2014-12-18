@extends('_master')

@section('title')
	Search Chores by Tag
@stop

@section('content')
<div id="longer_page" class="row">
  <div class="large-8 large-centered medium-10 medium-centered small-11 small-centered columns">
	<h3>Search Chores by Tag</h3>

<!-- show all the tag options -->

{{ Form::open(array('url' => '/search')) }}

        @foreach($tags as $id => $tag)
           {{ Form::radio('tags[]', $id); }} {{ $tag }}<br>
        @endforeach

        {{ Form::submit('Search'); }}

    {{ Form::close() }}
    <p>&nbsp;</p>
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
