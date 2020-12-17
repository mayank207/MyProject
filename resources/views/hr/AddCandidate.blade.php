@extends('hr.hrlink')
@section('content')
@if (count($errors) > 0)
           <div class = "alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
<br>
<div align="right">
   <a href="{{route('hrdashboard')}}" class="btn btn-danger">Back</a>
</div>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Candidate</h5>
              </div>
              <div class="card-body">
                  <form action="{{route('AddInter')}}" method="post">
                  <div class="row">
                  </div>
                  @csrf
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="">
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile</label>
                     <input type="number" name="mobilenumber" class="form-control" placeholder="Mobile Number" value="">
                      </div>
                    </div>
                  

                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Other Mobile Number</label>
                        <input type="number" name="othernumber" class="form-control" placeholder="Other Mobile Number" value="">
                      </div>
                    </div>


                    <div class="col-md-6 ">
                      <div class="form-group">
                        <label>Education</label>
                        <input type="text"  name="education" class="form-control" placeholder="Education" value="">
                      </div>
                    </div>

          <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Year Of Expirence</label>
                        <input type="number" name="expirence" class="form-control" placeholder="Year Of Expirence" value="">
                      </div>
                    </div><br><br>

                  <div class="col-md-6">
                      <div >
                        <label>Technology</label>
                        <select class="form-control" name="technology">
                        @foreach($tech as $technology)
                        <option value="{{$technology->id}}">{{$technology->technology}}</option>
                        @endforeach
                       </select> 
                      </div>
                    </div>
         
                 
              <div class="col-md-6 ">
                      <div class="form-group">
                        <label>Current Salary</label>
                        <input type="text"  name="currentsalary" class="form-control" placeholder="Current Salary" value="">
                      </div>
                    </div>

          <div class="col-md-6">
                      <div class="form-group">
                        <label>Expected Salary</label>
                        <input type="number"  name="expected" class="form-control" placeholder="Expected Salary" value="">
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-group">
                        <label>Practical Remark</label>
                        <input type="number" name="practicalremark" class="form-control" placeholder="Practical Remark" value="">
                      </div>
                    </div>

          <div class="col-md-6">
                      <div class="form-group">
                        <label>Technical Remark</label>
                        <input type="number" name="technicalremark" class="form-control" placeholder="Technical Remark" value="">
                      </div>
                    </div>

        <div class="col-md-6">
                      <div class="form-group">
                        <label>General Remark</label>
                        <input type="number" name="generelremark" class="form-control" placeholder="General Remark" value="">
                      </div>
                    </div>




                   </div><br>
                    <div class="col-md-12 ">
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





        </div>
      </div>
@endsection