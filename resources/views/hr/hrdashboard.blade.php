@extends('hr.hrlink')
@section('content')
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

      <div class="content">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Candidate</h5>
                <h4 class="card-title">ADD Candidate</h4>
              </div>
              <div class="card-body">
                <br><br>
                <div align="center">
                  <p><a href="{{route('AdInt')}}" class="btn btn-success">ADD</a></p>
                </div>
              </div>
               <div class="card-footer">
                <div >
                  <i class="now-ui-icons loader_refresh spin"></i>&nbsp;&nbsp;<b>Total Candidate <font size="+2">&nbsp;{{$candi}}</font></b>
                </div>
              </div>
            </div>
          </div>

<!-- E76311618E6 -->
  <!--  technology -->
          <div class="col-lg-6 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Technology</h5>
                <h4 class="card-title">ADD Technology</h4>
              </div>
              <div class="card-body">
                <br><br>
                <div align="center">
                  <p><a href="{{route('TechnoList')}}" class="btn btn-success">ADD</a></p>
                </div>
              </div>
               <div class="card-footer">
                <div >
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
                <h5 class="card-category">All List</h5>
                <h4 class="card-title">Company's Candidate List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead class=" text-primary">
  <tr>
    <td>NO.</td>
    <td>Name</td>
    <td>Email</td>
    <td>Mobile No.</td>
    <td>Technology</td>
    <td>Experience</td>
    <td>Current Salary</td>
    <td>Expected Salary</td>
    <td>Education</td>
    <td>Practical Remark</td>
    <td>Technical Remark</td>
    <td>General Remark</td>
    <td>Edit</td>
    <td>Delete</td>
  <tr>
                    </thead>
                      
                      <tbody>
  <tr>
      <?php
      $count=1;
      $i=0;
      ?>
      @foreach($interviewer as $interviewers )
    <td>{{$count++}}</td>
    <td>{{$interviewers->name}}</td>
    <td>{{$interviewers->email}}</td>
    <td>{{$interviewers->mobile}}</td>

    <td>{{$inter[$i++]->gettechnology['technology']}}</td>
    
    <td>{{$interviewers->expirence.'  Year'}}</td>
    <td>{{$interviewers->currentsalary}}</td>
    <td>{{$interviewers->expectedsalary}}</td>
    <td>{{$interviewers->education}}</td>
    <td>{{$interviewers->practical}}</td>
    <td>{{$interviewers->technical}}</td>
    <td>{{$interviewers->general}}</td>
    
    <td><a href="{{route('intersedit',$interviewers->id) }}"><i class="fa fa-edit"></i></a></td>
    <td><a href="{{ route('DelInter',$interviewers->id) }}" onclick="return confirm('Are You Sure To delete this ?')" ><i class="fa fa-trash"></i></a></td>
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
     @endsection