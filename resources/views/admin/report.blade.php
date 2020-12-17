@extends('management.link')

@section('content') 
  <div class="card bg-success text-white">
      <div class="card-body">
        <div align="center">
          <font size="+2"><b>Company's Report</b></font>
        </div>
      </div>
  </div>

<div align="right">
 <a href="#" class="btn btn-primary">BACK</a>
</div>
<br>
	<div class="row">
		<div class="col-md-6">
       		<div class="card bg-dark text-white" style="width: 100%">
            	 <div class="card-body">
                	<h5 class="card-title"><b>HR's List</b></h5><br>
                  		You Can Print The HR Report From Here
                    		<div align="center"><br>
                      		<p><a href="{{route('hrreport')}}" class="btn btn-primary"><b><font size="+1">HR </font></b></a>
                      </p>
                </div>
             </div>
        </div>
    </div>



	<div class="col-md-6">
       <div class="card bg-dark text-white" style="width: 100%">
             <div class="card-body">
                <h5 class="card-title"><b>Candidate's List</b></h5><br>
                  You Can Print Candidate Report From Here
                    <div align="center"><br>
                      <p><a href="{{route('candidatereport')}}" class="btn btn-primary"><b><font size="+1">Candidate </font></b></a>
                      </p>
                </div>
             </div>
        </div>
    </div>

</div>
  <br>

  <!-- Details -->


                    
@endsection