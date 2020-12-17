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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
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
     
      <div class="panel-header panel-header-sm">
@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

@if(session('errors'))
<div class="bg-danger"><b>{{session('errors')}}</b></div>
@endif
@if(session('warning'))
<div class="bg-danger"><b>{{session('warning')}}</b></div>
@endif

@if(session('error'))
<div class="bg-danger">{{session('error')}}</div>
@endif

@if(session('TECH'))
<div class="bg-success text-white"><script>alert('{{ ($msg ?? 'Technology Add Successfully')}}');</script></div>
@endif


      </div>
      <div class="content">
        <br><br>
        
        <div class="row">
          <div class="col-md-12 px-1">
            <div class="card">
              <div class="card-body">
          <div class="container">
            <h2> Technology's</h2>
            <!-- Trigger the modal with a button -->
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <div align="center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>
          </div>
          <div align="right">
              <a href="{{route('hrdashboard')}}" class="btn btn-danger">Back</a>
          </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body" >
                    <div align="center">

                  <form method="post" action="{{ route('AddTechno') }}">
                        @csrf
                           
                            </div>

                            <div class="row" >
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" name="technology" class="form-control" placeholder="Full Name" value="">
                                </div>
                              </div>

                             </div><br>
                              <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <div align="center">
                                  <input type="submit" class="btn btn-success"  value="ADD">
                                  </div>
                                </div>
                              </div>
                         </form>
                          
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>

<!-- end -->
               
              </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Technology's List</h5>
                <h4 class="card-title">Our Company Technology's</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <td><b>Technology</b></td>
                        <td ><b>Add By</b></td>
                        
                    </thead>
                    <tbody>
                       <tr>
                      @foreach($tech as $technology)
                      <td>{{$technology->technology}}</td>
                      <td>{{$technology->tech->name }}</td>
                    </tr>
                      @endforeach

                    </tbody>
                  </table>
                        <div class="d-flex justify-content-center">
                      {{ $tech->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>


            </div>
            
          </div>

        </div>
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
                <a href="{{route('admindashboard')}}" class="btn btn-danger">
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
         Coded by <a href="{{route('manthan')}}">Manthan Mordhara</a>.
      </div>
        </div>
      </footer>




    <script src="../assets/js/core/jquery.min.js"></script>


  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> 
  <script src="../assets/demo/demo.js"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/123.js')}}"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script>
  @yield('js')
</script>

</body>
</html>