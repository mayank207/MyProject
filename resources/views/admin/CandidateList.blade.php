@extends('management.link')

@section('content')
	<div class="card bg-info text-white">
		<div class="card-body" align="center"><font size="+2"><b>Candidate List</b></font></div>
	</div>
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

@if(session('warning'))
<div class="bg-danger text-white">{{ session('warning')}}</div>
@endif

<div align="right">
     <a href="{{route('admindashboard')}}" class="btn btn-danger">Back</a>
</div>

    <div class="row input-daterange my-5">
        <div class="col-md-4">
            <input type="text" name="from_date" id="from_date" class="form-control border border-primary" placeholder="From Date" readonly />
        </div>
        <div class="col-md-4">
            <input type="text" name="to_date" id="to_date" class="form-control border border-primary" placeholder="To Date" readonly />
        </div>
        <div class="col-md-4">
            <div class="btn-group">
            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
            </div>
        </div>
    </div>
<table  class="table table-hover" id="inter" width="100%">
<thead>

	<tr>
		
		<td>Name</td>
		<td>Email</td>
		<td>Mobile No.</td>
		<td>Other Mobile No.</td>
        <td>technology</td>
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
	<tbody>
		
	</tbody>
</table>
@endsection

@section('js')

  $('.input-daterange').datepicker({
        todayBtn:'linked',
        format:'yyyy-mm-dd',
        autoclose:true
    });

    fetchCategory();

    function fetchCategory(from_date = '', to_date = '')
    {
 		$('#inter').DataTable({
        "processing": true,
        "serverSide":true,
        "responsive":true,
        ajax:{

            url:"{{route('Candidate')}}",
             data: {from_date:from_date, to_date:to_date},
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
      }

        $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
            $('#inter').DataTable().destroy();
            fetchCategory('',from_date, to_date);
        }
        else
        {
            alert('Both Date is required');
        }
    });


    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#inter').DataTable().destroy();
        fetchCategory();
    });
@endsection