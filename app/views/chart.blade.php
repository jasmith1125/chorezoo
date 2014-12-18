@extends('_master')

@section('title')
   Here Is Your Chore Chart!
@stop

@section('content')
 
 
<div class="row">
<div class="large-9 large-centered medium-10 medium-centered small-11 small-centered columns">
   
<h3>Here Is Your Chore Chart!</h3>

@if ($chores->isEmpty())
<p>There are no chores!</p>
@else
    
<table>
	<thead class="choreheader">
		<tr>
		<th>Chore Description</th>
		<th>Completed?</th>
		<th>Actions</th>
		</tr>
	</thead>
		<tbody>
		@foreach($chores as $chore)
		<tr>
		<td>{{ $chore->description }}</td>
		<td>{{ $chore->completed ? 'Yes' : 'No' }}</td>
		<td>
		<a href="{{ action('ChoreController@getEdit', $chore->id) }}" class="button tiny secondary">Edit/Add Tag</a>
		<a href="{{ action('ChoreController@getDelete', $chore->id) }}" class="button tiny alert">Delete</a>
		</td>
		</tr>
	@endforeach
		</tbody>
	</table>
	</div>
	</div>

	@endif
	 <p>&nbsp;</p>   

@stop
