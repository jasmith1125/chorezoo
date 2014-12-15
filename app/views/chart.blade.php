@extends('_master')

@section('title')
   Here Is Your Chore Chart!
@stop

@section('content')
 
 
<div id="longer_page" class="row">
<div class="large-10 large-centered columns">

<h2>Here Is Your Chore Chart!</h2>

<div class="row">
<div class="large-12 large-centered columns">
@if ($chores->isEmpty())
<p>There are no chores!</p>
@else
    
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
<a href="{{ action('ChoreController@edit', $chore->id) }}" class="button tiny secondary">Edit Chore/Add Tag</a>
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
