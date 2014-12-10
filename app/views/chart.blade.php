@extends('_master')

@section('title')
   Here Is Your Chore Chart!
@stop

@section('content')
 
 
<div class="row">
<div id="container" class="large-10 large-centered columns">

<div class="row">
<div class="large-10 large-centered columns">
<h2>Here Is Your Chore Chart!</h2>
<h3>Edit, delete and add chores to make this chart your own!</h3>
</div>
</div>
<div class="row">
<div class="large-12 large-centered columns">
@if ($chores->isEmpty())
<p>There are no chores! :(</p>
@else
<table>
<thead class="choreheader">
<tr>
<th width="600">Chore Description</th>
<th width="250">Completed?</th>
<th width="250">Actions</th>
</tr>
</thead>
<tbody>
@foreach($chores as $chore)
<tr>
<td>{{ $chore->description }}</td>
<td>{{ $chore->completed ? 'Yes' : 'No' }}</td>
<td>
<a href="{{ action('ChoreController@edit', $chore->id) }}" class="button tiny secondary">Edit</a>
<a href="{{ action('ChoreController@delete', $chore->id) }}" class="button tiny alert">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<div class="large-8 push-4 columns">
<div class="panel-body">
<a href="{{ action('ChoreController@getCreate') }}" class="button success radius">Create New Chore</a>
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
