@extends('_master')

@section('title')
   Search Results
@stop

@section('content')
 
	<div class="row">
	 <div class="large-10 large-centered medium-10 medium-centered small-11 small-centered columns">
	<h3>Here Are Your Search Results!</h3>

		@if ($chores->isEmpty())
		<p>There are no chores with this tag</p>
		@else
		    
	<table>
		<thead>
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
