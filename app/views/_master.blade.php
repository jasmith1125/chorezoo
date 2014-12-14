<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','ChoreZoo')</title>

    {{ HTML::style('css/foundation.css') }}
  {{ HTML::style('css/normalize.css')}}
  {{ HTML::style('css/app.css') }}
  
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Slackey' rel='stylesheet' type='text/css'>
  <script src="{{ URL::asset('js/vendor/custom.modernizr.js') }}"></script>

    @yield('head')


</head>
<body>
 
  <img src="../img/giraffe_banner3.png" alt="zoo animals" >

<div class="row">
<div id="container" class="large-8 large-centered columns">

   @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

<ul class="inline-list">
        @if(Auth::check())
            <li><a href='/logout'>Log out {{ Auth::user()->username; }}</a></li>
            <li><a href='/chart'>Your Chore Chart</a></li>
            <li><a href='/create'>Create a New Chore</a></li>
            <li><a href='/search'>Search Chores by Tag</a></li>
            </ul>
        @else
         
           <ul class="button-group radius">
            <li><a href='/signup' class="medium button alert">Sign Up</a></li>
          <li><a href='/login' class="medium button alert">Log In</a></li>
          </ul>
        @endif
   


    </div>
   </div>

    

    @yield('content')

    @yield('/body')
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>




