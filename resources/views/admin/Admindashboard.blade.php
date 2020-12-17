@extends('management.link')
@section('content')

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif


<div class="row">
  <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">HR</h5>
                <h4 class="card-title">ADD COMPANY HR </h4>
              </div>
              <div class="card-body"> 
                <br><br>
                <div align="center">
                  <p><a href="{{route('AddHr')}}" class="btn btn-success">ADD</a></p>
                </div>
              </div>
               <div class="card-footer">
                
                  <i class="now-ui-icons loader_refresh spin"></i><b>&nbsp;&nbsp;Total&nbsp;&nbsp; Human Resource <font size="+2">&nbsp;{{$hr1}}</font></b>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Candidate</h5>
                <h4 class="card-title">ADD Candidate</h4>
              </div>
              <div class="card-body">
                <br><br>
                <div align="center">
                  <p><a href="{{route('AddNewInter')}}" class="btn btn-success">ADD</a></p>
                </div>
              </div>
               <div class="card-footer">
                
                  <i class="now-ui-icons loader_refresh spin"></i><b>&nbsp;&nbsp;Total&nbsp; Candidate
                 <font size="+2">&nbsp; {{$inter}}</font>
              </b></div>
            </div>
          </div>

  <!--  technology -->
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Technology</h5>
                <h4 class="card-title">ADD Technology</h4>
              </div>
              <div class="card-body">
                <br><br>
                <div align="center">
                  <p><a href="{{route('Tech')}}" class="btn btn-success">ADD</a></p>
                </div>
              </div>
               <div class="card-footer">
                <div class="">
                  <i class="now-ui-icons loader_refresh spin"></i>&nbsp;&nbsp;<b>Total Technology <font size="+2">&nbsp;{{$tech}}</font></b>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Back End -->
        <div class="row">
  <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All HR's List</h5>
                <h4 class="card-title">Company HR's</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <td>NO.</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Mobile</td>
                      <td>Education</td>
                      <td>Expirence</td>
                      <td>Salary</td>
                      <td>Edit</td>
                      <td>Delete</td>
                    </thead>
                      <tbody>
                        <tr>
                        <?php
                        $count=1;
                        ?>  
                        @foreach($hr as $hrs)
                        <td>{{$count++}}</td>
                        <td>{{$hrs->name}}</td>
                        <td>{{$hrs->email}}</td>
                        <td>{{$hrs->mobile}}</td>
                        <td>{{$hrs->education}}</td>
                        <td>{{$hrs->expirence}}</td>
                        <td>{{$hrs->salary}}</td>
                        <td><a href="{{route('Edit.edit',$hrs->id)}}"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{route('DeleteHr',$hrs->id)}}"  onclick="return confirm('Are You Sure  To Delete This ?')"><i class="fa fa-trash"></i></a></td>

                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Persons List</h5>
                <h4 class="card-title">Candidate List's</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead class=" text-primary">
                  
                      <td>NO.</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Mobile No.</td>
                      <!-- <td>Technology</td> -->
                      <td>Experience</td>
                      <td>Current Salary</td>
                      <td>Expected Salary</td>
                      <td>Education</td>
                      <td>Practical Remark</td>
                      <td>Technical Remark</td>
                      <td>General Remark</td>
                      <td>Edit</td>
                      <td>Delete</td>
  
                    </thead>
                      <tbody>
                      <tr>
                    <?php
                    $count=1;
                    ?>
                    @foreach($interviewer as $interviewers )
                  <td>{{$count++}}</td>
                  
                  <td>{{$interviewers->name}}</td>
                  <td>{{$interviewers->email}}</td>
                  <td>{{$interviewers->mobile}}</td>

                  <!-- <td>{{$interviewers->technology}}</td> -->
                  
                  <td>{{$interviewers->expirence}}</td>
                  <td>{{$interviewers->currentsalary}}</td>
                  <td>{{$interviewers->expectedsalary}}</td>
                  <td>{{$interviewers->education}}</td>
                  <td>{{$interviewers->practical}}</td>
                  <td>{{$interviewers->technical}}</td>
                  <td>{{$interviewers->general}}</td>
                  <td><a href="{{route('CandidateEditList',['id'=>$interviewers->id])}}"><i class="fa fa-edit"></i></a></td>
                  <td><a href="{{route('DeleteInter',$interviewers->id)}}"  onclick="return confirm('Are You Sure  To Delete This  ?')"><i class="fa fa-trash"></i></a></td>
                </tr>
  @endforeach


                    </tbody>
                  </table>
                   
                </div>
              </div>
            </div>
          </div>
        </div>

              

              
          
     
    </div>
  </div>
@endsection
