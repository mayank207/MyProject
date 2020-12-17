
<!DOCTYPE html>
<html>
<head>

<title>Log-in Here</title>
</head>
<style>
	body {
  background-image: url('5.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<body class="container" >
 <div class="card bg-info text-white">
   <div class="card-body">
   		<div align="center">
   			<font size="+2"><b>HR Log-in</b></font>
   		</div>
   	</div>
</div>
<br><br>
<table align="center">

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
	<tr>
		<td>
			<form action="{{ route('hrLogin') }}" method="POST">
			 @csrf
				<h1 align="center"><b>Login Here</b></h1><br><br>
			
				<label>Email:-&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<input type="email" name="email" placeholder="Email"><br><br>
			
				@if($errors->has('email'))
	    			<p class="text-danger">{{ $errors->first('email') }}</p>
	 			@endif

				<label>Password</label>
				<input type="password" name="password"  placeholder="password"><br><br>
				
				@if($errors->has('password'))
	    			<p class="text-danger">{{ $errors->first('password') }}</p>
	 			@endif


				<div align="center">
				<input class="btn btn-primary" type="submit" name="submit" value="submit"><br><br>
		
			</form>
			
			<a class="btn btn-danger" href="home" name="back">Back</a><br><br>
			
			</div>
		</div><br>
	</td>
</tr>
</table>
</body>
</html>