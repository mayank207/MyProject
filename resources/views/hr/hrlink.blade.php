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
  <!-- <link href="{{asset('demo/demo.css')}}" rel="stylesheet" /> -->
  <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link >
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
         Management
        </a>
      </div>

               <div align="center">
            
          </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            
              <i class="now-ui-icons business_badge"></i>
          {{'Hello Mr. '.auth()->user()->name}}            
          
          </li>
          <br>
          <li class="{{ (request()->is('hrdashboard')) ? 'active':'' }}">
            <a href="{{route('hrdashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
    
         <li class="{{ (request()->is('CandidateList')) ? 'active':'' }}">
            <a href="{{route('CandidateList')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Candidate's</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="{{route('hrdashboard')}}"><font size="+2">H.R. Dashboard</font></a>
          </div><bt>
 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
 
                <a class="nav-link" href="{{route('logout')}}">
                  <i class="now-ui-icons media-1_button-power"></i>
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                  </p>
                </a>
              
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                  <i class="now-ui-icons media-1_button-power"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif
@if(session('TECH'))
<div class="bg-success text-white"><script>alert('{{ ($msg ?? 'Technology Add Successfully')}}');</script></div>
@endif

@if(session('Interviewer'))
<div class="bg-success text-white "><script>alert('{{ ($msg ?? 'Interviewer Add Successfully')}}');</script></div>
@endif
      </div>
      <div class="content">
        
        


@yield('content')



        </div>
      </div>
    </div>
 



    <script src="../assets/js/core/jquery.min.js"></script>


  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> 
  <script src="../assets/demo/demo.js"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/123.js')}}"> </script>
<script>
  @yield('tbl')
</script>

    <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>

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




