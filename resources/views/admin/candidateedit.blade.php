@extends('management.link')
@section('content')
<div class="card bg-info text-white">
	<div align="center" class="cardbody">
		<font size="+2"><b>Edit Candidate</b></font>
	</div>	
</div>
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

 @if (count($errors) > 0)
        	 <div class = "alert alert-danger">
            	<ul>
               		@foreach ($errors->all() as $error)
                  	<li>{{ $error }}</li>
               		@endforeach
            	</ul>
         	</div>
      	@endif
<div align="right"><br>
	<a href="{{route('Candidate')}}" class="btn btn-danger">BACK</a>
</div>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Interviewer</h5>
              </div>
              <div class="card-body">
                 @foreach($inter as $inters )
			<form action="{{route('CandidateEdit',[$inters->id])}}" method="post">
                  <div class="row">
                  </div>
                  @csrf
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{$inters->name}}">
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$inters->email}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="number" name="mobilenumber" class="form-control" placeholder="Mobile Number" value="{{$inters->mobile}}">
                      </div>
                    </div>
                  

                 
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Other Mobile Number</label>
                        <input type="number" name="othernumber" class="form-control" placeholder="Other Mobile Number" value="{{$inters->exmobile}}">
                      </div>
                    </div>


                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Education</label>
                        <input type="text"  name="education" class="form-control" placeholder="Education" value="{{$inters->education}}">
                      </div>
                    </div>

					<div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Year Of Expirence</label>
                        <input type="number" name="expirence" class="form-control" placeholder="Year Of Expirence" value="{{$inters->expirence}}">
                      </div>
                    </div><br><br>


                 
	            <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Current Salary</label>
                        <input type="text"  name="currentsalary" class="form-control" placeholder="Current Salary" value="{{$inters->currentsalary}}">
                      </div>
                    </div>

					<div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Expected Salary</label>
                        <input type="number"  name="expected" class="form-control" placeholder="Year Of Expirence" value="{{$inters->expectedsalary}}">
                      </div>
                    </div>

                     <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Practical Remark</label>
                        <input type="number" name="practicalremark" class="form-control" placeholder="Practical Remark" value="{{$inters->practical}}">
                      </div>
                    </div>

					<div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Technical Remark</label>
                        <input type="number" name="technicalremark" class="form-control" placeholder="Technical Remark" value="{{$inters->technical}}">
                      </div>
                    </div>

				<div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>General Remark</label>
                        <input type="number" name="generelremark" class="form-control" placeholder="General Remark" value="{{$inters->general}}">
                      </div>
                    </div>




                   </div><br>
                    <div class="col-md-12 px-1">
                      <div class="form-group">
                          
                          <div align="center">
                        <input type="submit" class="btn btn-success"  value="submit">
                        </div>
                      </div>
                    </div>
               
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
	@endforeach
@endsection

