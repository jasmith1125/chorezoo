@extends('_master')

@section('title')
   Search Results
@stop

@section('content')
 
	<div id="longer_row" class="row">
	<div class="large-10 large-centered columns">
	<h3>Here Are Your Search Results!</h3>

	</div>
	</div>
	<div class="row">
	<div class="large-12 large-centered columns">
		@if ($chores->isEmpty())
		<p>There are no chores with this tag</p>
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
				<a href="{{ action('ChoreController@getEdit', $chore->id) }}" class="button tiny secondary">Edit/Add Tag</a>
<a href="{{ action('ChoreController@getDelete', $chore->id) }}" class="button tiny alert">Delete</a>
				</td>
			</tr>
		@endforeach
		</tbody>
		</table>
		<p>&nbsp;</p>
		
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
