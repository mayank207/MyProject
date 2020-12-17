@extends('hr.hrlink')
@section('content')
<br><br>
 <div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <b>Select Candidate List</b>
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
<div align="right">
     <a href="{{route('hrdashboard')}}" class="btn btn-danger">Back</a>
</div>
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
            <div class="card">
              <div class="card-header" align="center">
                <h5 class="title">All Interviewer's</h5>
              </div>
              </div>
 @if(session('warning'))
<div class="bg-info"><b>{{ session('warning') }}</b></div>
@endif
<div class="card-body">
        <div class="table-responsive">
      <table class="table" id="int">
     <thead class=" text-primary">

	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile No.</td>
		<td>Other Mobile No.</td>
		<td>Technology</td>
		<td>Experience</td>
		<td>Current Salary</td>
		<td>Expected Salary</td>
		<td>Education</td>
		<td>Practical Remark</td>
		<td>Technical Remark</td>
		<td>General Remark</td>
		
	</tr>
</thead>
	<tbody>

	</tbody>
</table></div></div>
@endsection

@section('tbl')

	 $('#int').DataTable({
        "processing": true,
        "serverSide":true,
        "responsive":true,
        ajax:{

            url:"{{route('AllInterviewer')}}",
            
        },
        columns:[

             {data:"name",className:"name"},
            {data:"email",className:"email"},
            {data:"mobile",className:"mobile"},
             {data:"exmobile",className:"exmobile"},
             {data:"technology",className:"technology"},
             {data:"expirence",className:"expirence"},
             {data:"currentsalary",className:"currentsalary"},
             {data:"expectedsalary",className:"expectedsalary"},
            {data:"education",className:"education"},
            {data:"practical",className:"practical"},
            {data:"technical",className:"technical"},
            {data:"general",className:"general"},
       
           
            ]
        });
@endsection
