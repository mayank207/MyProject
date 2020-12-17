@extends('management.link')
@section('content')
<div align="right">
	<a href="{{route('Edit.index')}}" class="btn btn-danger">Back</a>
</div>

<form action="{{route('searchdate')}}" method="post">
	@csrf
    <div align="center">
  <b>from</b>

<input type="date" name=startdate>
&nbsp; &nbsp; &nbsp; 
<b>TO</b>
<input type="date" name=enddate>

<input type="submit" name="submit" value="filter"  class="btn btn-primary">
</div>
</form>


<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>


<br>
<table class="table table-hover" id="tbl">
	<thead>
	<tr>
	<b>
		<td>No</td>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile No.</td>
		<td>Other Mobile No.</td>
		<td>Technology</td>
		<td>Expirence</td>
		<td>Current Salary</td>
		<td>Expected Salary</td>
		<td>Education</td>
		<td>Practical Remark</td>
		<td>Technical Remark</td>
		<td>Genral Remark</td>
		
		
    </b>
	</tr>
</thead>
	<tbody>
		<tr>
		@php
		$count=1;
		@endphp
		@foreach($candidate as $candidates)
		<td>{{($count++)}}</td>
		<td>{{$candidates->name}}</td>
		<td>{{$candidates->email}}</td>
		<td>{{$candidates->mobile}}</td>
		<td>{{$candidates->exmobile}}</td>
		<td>{{$candidates->technology}}</td>
		<td>{{$candidates->expirence}}</td>
		<td>{{$candidates->currentsalary}}</td>
		<td>{{$candidates->expectedsalary}}</td>
		<td>{{$candidates->education}}</td>
		<td>{{$candidates->practical}}</td>
		<td>{{$candidates->technical}}</td>
		<td>{{$candidates->general}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
  <div class="d-flex justify-content-center">
        {{ $candidate->links() }}
    </div>



@endsection