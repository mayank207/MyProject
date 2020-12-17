@extends('management.link')
@section('content')

<div align="right">
	<a href="{{route('Edit.index')}}" class="btn btn-danger">Back</a>
</div>

     <div align="center">   
        <div class="col-md-4">
            <div >   

                <form action="{{ route('searchname') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="candidate_name" placeholder="Search Name">
                    </div><br>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
               </div>
           </div>
    </div>

<table class="table table-hover" id="tbl">
	<thead>
	<tr>
	<b>
		<td>No</td>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Education</td>
		<td>Expirence</td>
		<td>Salary</td>
		
    </b>
	</tr>
</thead>
	<tbody>
		<tr>
		@php
		$count=1;
		@endphp
		@foreach($hrs as $hr)
		<td>{{($count++)}}</td>
		<td>{{$hr->name}}</td>
		<td>{{$hr->email}}</td>
		<td>{{$hr->mobile}}</td>
		<td>{{$hr->education}}</td>
		<td>{{$hr->expirence}}</td>
		<td>{{$hr->salary}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
  <div class="d-flex justify-content-center">
        {{ $hrs->links() }}
    </div>


@endsection