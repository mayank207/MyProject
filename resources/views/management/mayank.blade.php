<!DOCTYPE html>
<html>
<head>
  <title>Management</title>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
   
      <div class="logo">
        <a href="home" class="simple-text logo-normal">
         Management
        </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{route('jeet')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Designer</p>
            </a>
          </li>
          <li class="active ">
            <a href="{{route('manthan')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Web Devloper</p>
            </a>
          </li>


         </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
                        
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">

                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" value="Mayankmordhara207@gmail.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="mayank">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Mordhara">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="6,Ayodhya Apt, Girnar road">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="junagadh">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="India">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code" value="362001">
                      </div>
                    </div>
                  </div>
                  <br><br><br>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>

                <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="321.jpg" alt="...">
                    <h5 class="title">Mayank Mordhara</h5>
                  </a>
                </div>
                
                  <p class="description">
                    Mayank207@gmail.com
                  </p>
                <p class="description text-center">
                  "Web Devloper <br>
                  User Happiness & User satisafaction<br>
                 Client is Our God"
                </p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="{{route('logout')}}" class="btn btn-danger">
                    Back
                </a>
              </li>
              
            </ul>
          </nav>
                <div class="copyright" id="copyright">
        &copy; <script>
          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear())) 
        </script>&nbsp;&nbsp;

        Designed by  :<a href="{{route('jeet')}}">Jeet Ghodasara</a>.
         Coded by <a href="{{route('manthan')}}">Mayank Mordhara</a>.
      </div>
        </div>
      </footer>


  </body>
  </html>