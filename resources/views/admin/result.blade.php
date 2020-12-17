@extends('management.link')
@section('Content')
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

<!DOCTYPE html>
<html>
<head>
        <title>Result Data</title>
</head>
<body>
        <div align="right"><br>
        <a href="{{route('search')}}" class="btn btn-danger">BACK</a>
        </div>



<br><br>
@if($details)
<table class="table table-hover">
        <tr bgcolor="aqua">
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Technology</td>
                <td>Expirence</td>
                <td>Current Salary</td>
                <td>Expected Salary</td>
                <td>Education</td>
                <td>Practical Remark</td>
                <td>Technical Remark</td>
                <td>General Remark</td>
        </tr>

        <tr>@foreach($details as $a)
                <td>{{$a->name}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->mobile}}</td>
                <td>{{$a->technology}}</td>
                <td>{{$a->expirence}}</td>
                <td>{{$a->currentsalary}}</td>
                <td>{{$a->expectedsalary}}</td>
                <td>{{$a->education}}</td>
                <td>{{$a->practical}}</td>
                <td>{{$a->technical}}</td>
                <td>{{$a->general}}</td>
        </tr>
        @endforeach
</table>

@endif
@endsection
