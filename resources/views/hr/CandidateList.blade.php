@extends('hr.hrlink')
@section('content')
<br><br>



 
 <div class="col-lg-4">
    <div class="card">
        <div class="card-header">
           <b> Select Candidate List</b>
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
                <h5 class="title">My Interviewer's</h5>
              </div>
              </div>
 @if(session('warning'))
<div class="bg-info"><b>{{ session('warning') }}</b></div>
@endif

<div class="card-body">
        <div class="table-responsive">
      <table class="table" id="candidate">
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
		<td>Action</td>
		
	</tr>
	</thead>
<tr>	
	<tbody>
		
	</tbody>
</tr>
</table></div></div>
@endsection
@section('tbl')

	 $('#candidate').DataTable({
        "processing": true,
        "serverSide":true,
        "responsive":true,
        ajax:{

            url:"{{route('CandidateList')}}",
            
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
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    
    $('body').on('click', '.deleteCandidate', function () {

        var product_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
            $.ajax({
            type: "DELETE",
            url: "{{ route('intersedit',"'.['id'=>product_id].'") }}",
            success: function (data) {
                console.log(data);
                    $('#candidateDetails').DataTable().ajax.reload();
                    var r=JSON.parse(data);
            if(r.status==true)
            {
                $alert="<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Danger</strong>"+
                r.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $('#deleteCandidate').prepend($alert);
            }
            else
            {
                $alert="<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Danger</strong>"+
                r.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $('#deleteCandidate').prepend($alert);
            }
                },
            error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
        else
        {
            return false;
        }
    });



@endsection

