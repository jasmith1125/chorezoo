@extends('_master')

@section('title')
   Welcome to Chore Zoo
@stop

@section('content')
 
 
<div id= "longer_page" class="row">
<div class="large-10 large-centered columns">

   @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
@stop
