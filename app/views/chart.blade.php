@extends('_master')

@section('title')
   Here Is Your Chore Chart!
@stop

@section('content')
 
 
<div class="row">
<div id="container" class="large-10 large-centered columns">


<div class="row">
<div class="large-10 columns">
<h2>Here Is Your Chore Chart!</h2>

</div>
</div>
<div class="row">
<div class="large-12 large-centered columns">
@if ($chores->isEmpty())
<p>There are no chores! :(</p>
@else
    <h5 small>Search Chores by Tag</h5 small>
{{ Form::open(array('url' => '/chart')) }}
  {{ Form::radio('homework')}}{{ Form::label('homework', 'Homework', array('class' => 'awesome')) }}
    {{ Form::radio('housework')}}{{ Form::label('housework', 'Housework', array('class' => 'awesome')) }}
 {{ Form::radio('event')}}{{ Form::label('event', 'Event', array('class' => 'awesome')) }}
 {{ Form::radio('top_priority')}}{{ Form::label('top_priority', 'Top Priority', array('class' => 'awesome')) }} 
 {{ Form::radio('community_service')}}{{ Form::label('community_service', 'Community Service', array('class' => 'awesome')) }} 
 {{ Form::radio('fun_stuff')}}{{ Form::label('fun_stuff', 'Fun Stuff', array('class' => 'awesome')) }} {{Form::submit('Search', ['class' => 'tiny button'])}}
{{ Form::close() }}
<table>
<thead class="choreheader">
<tr>
<th width="500">Chore Description</th>
<th width="250">Completed?</th>
<th width="400">Actions</th>
</tr>
</thead>
<tbody>
@foreach($chores as $chore)
<tr>
<td>{{ $chore->description }}</td>
<td>{{ $chore->completed ? 'Yes' : 'No' }}</td>
<td>
<a href="{{ action('ChoreController@edit', $chore->id) }}" class="button tiny secondary">Edit</a>
<a href="{{ action('ChoreController@edit', $chore->id) }}" class="button tiny secondary">Add Tag</a>
<a href="{{ action('ChoreController@delete', $chore->id) }}" class="button tiny alert">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

@endif
    
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
@stop
