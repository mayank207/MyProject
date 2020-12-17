@extends('management.link')
<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="home" class="simple-text logo-normal">
         Management
        </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          
          <li >
            <a href="{{route('admindashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li >
            <a href="{{route('AddHr')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Add HR</p>
            </a>
          </li >
          <li>
            <a href="{{route('AddNewInter')}}">
              <i class="now-ui-icons objects_diamond"></i>
              <p>Add Interviewer</p>
            </a>
          </li>
          <li>
            <a href="{{route('Tech')}}">
              <i class="now-ui-icons objects_spaceship"></i>
              <p>Add  technology</p>
            </a>
          </li>
          <li class="active ">
            <a href="{{route('profile')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>my Profile</p>
            </a>
          </li>



         </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
  @if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
      </div>
      <div class="content">
        <div class="row">

          <div class="col-md-8">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>

                <div class="card-body">
                <div class="author">
                 <br><br><br><br>
                    <h5 class="title">Jeet Ghodasra</h5>
                  
                </div>
                
                  <p class="description">
                    jeetghodasra@gmail.com
                  </p>
                <p class="description text-center">
                  "Web Designing <br>
                  User intrected & User eXtraction<br>
                 Client is Our God"
                </p>
              </div>
              <hr>
            </div>
          </div>
          <!-- End 1st -->


          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="title">My Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>

                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="">Description</textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- End 2nd -->
        </div>
      </div>
    </div>
  </div>