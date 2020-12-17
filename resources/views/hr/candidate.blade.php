@extends('hr.hrlink')
@section('content')
<br><br>
 
 <div class="col-lg-4">
    <div class="card">
    	<div class="card-header">

			<form action="{{route('candidetes')}}" method="post">
				@csrf

				<div class="col-lg-12">
					<select name="value" class="form-control">
						
						<option value="all-candidate">All Candidate</option>
						<option value="my-candidate">My Candidate</option>

					</select>
				</div><br>

				<div class="col-md-5">
			 		<input class="form-control" type="submit" value="submit">
				</div><br>
			</form>
		</div>
	</div>
</div>



@endsection