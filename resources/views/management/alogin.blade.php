@extends('management.style')
<title>Log-in Here</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="wrapper fadeInDown">
<div id="formContent">
    <!-- Tabs Titles -->

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
@if(session('warning'))
<div align="center" class="bg-danger text-white"><b>{{ session('warning') }}</b></div>
@endif
<br><br>
    <!-- Icon -->
    <div class="fadeIn first">
        <img src="logo.png" id="icon" alt="User Icon" />
    </div>

<!-- Login Form -->
<form action="{{ route('login') }}" method="post">
@csrf
      <input type="email" id="login" name="email" class="fadeIn second" name="login" placeholder="email" >
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
      
      <input type="password" id="password" name="password" class="fadeIn third" name="login" placeholder="password">
        @if($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif

      <input type="submit" class="fadeIn fourth" value="Log In">
</form>

<div>
  <a href="{{route('home')}}" class="btn btn-danger">Back</a>
</div>


  </div>
</div>