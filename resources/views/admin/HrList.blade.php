@extends('management.link')
<!DOCTYPE html>
<html>
<head>
    
	<title>HR Edit</title>
</head>

@section('content')

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

@if(session('warning'))
<div class="bg-danger text-white">{{ session('warning')}}</div>
@endif


<div align="center" class="bg-info text-white">
<font size="+2"><b>{{'HR List'}}</b></font>
</div><br><br>
<div align="right"> 
    <a href="{{route('admindashboard')}}" class="btn btn-danger">Back</a>
</div>
<table class="table table-hover" id="tbl">
	<thead>
	<tr>
	<b>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Education</td>
		<td>Expirence</td>
		<td>Salary</td>
		<td>Action</td>
    </b>
	</tr>
</thead>
	<tbody>

		
	</tbody>
</table>
                    
@endsection
@section('js')

 $('#tbl').DataTable({
        "processing": true,
        "serverSide":true,
        "responsive":true,
        ajax:{

            url:"{{route('Edit.create')}}",
            
        },
        columns:[

            {data:"name",className:"name"},
            {data:"email",className:"email"},
            {data:"mobile",className:"mobile"},
            {data:"education",className:"education"},
            {data:"expirence",className:"expirence"},
            {data:"salary",className:"salary"},
       
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
@endsection
