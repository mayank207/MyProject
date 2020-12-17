@extends('management.link')

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

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
<br><br>
<div align="right">
   <a href="{{route('admindashboard')}}" class="btn btn-danger">Back</a>
</div>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add HR</h5>
              </div>
              <div class="card-body">
               <form action="{{route('CreatHr')}}" method="post">
                    @csrf

                  <div class="row">
                  </div>

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
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="number" name="mobilenumber" class="form-control" placeholder="Mobile Number" value="">
                      </div>
                    </div>
                  
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Education</label>
                        <input type="text" name="education" class="form-control" placeholder="Education" value="">
                      </div>
                    </div>
                      </div>

                 <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Year Of Expirence</label>
                        <input type="number" name="expirence"  class="form-control" placeholder="Year Of Expirence" value="">
                      </div>
                    </div>
                

                
                   <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>salary</label>
                        <input type="number" name="currentsalary" class="form-control" placeholder="Salary" value="">
                      </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"  class="form-control" placeholder="Password" value="">
                      </div>
                    </div>
                  </div>
                   
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





        </div>
      </div>
@endsection