@extends('management.link')
<!DOCTYPE html>
<html>
<head>
    <title>Search Candidate</title>
</head>
    <div class="card bg-success text-white">
        <div class="card-body">
            <div align="center">
                <font size="+2"><b>Search Candidate</b></font>
                <div align="right"><b>
                    {{'Hello Mr.   '.auth()->user()->name}}
                </div></b>
            </div>
        </div>
    </div>
 <body class="container">       

 @if(session('warning'))
<div class="bg-danger">{{ session('warning')}}</div>
 @endif

<div align="left">
        <a href="{{route('admindashboard')}}" ><div class="floar-left m-5"><i class="fa fa-arrow-left fa-2x"></i></div></a>
        </div> 

   <div class="row">
        <div class="col-md-4">
          <div class="card bg-dark text-white" style="width: 100%">
               <div class="card-body">       
                    
        
      <h2 class="mt-12 text-center">Search Candidate Name</h2>

 
                <form action="{{ route('searchname') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="candidate_name" placeholder="Search Name">
                    </div><br><br><br>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
               </div>
           </div>
    </div>
   
    <div class="col-md-4">
          <div class="card bg-dark text-white" style="width: 100%">
               <div class="card-body">       
                    
                    <h2 class="mt-12 text-center">Search Candidate By date</h2>
      
                    <form action="{{ route('searchdate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="from">From</label>
                        <input type="date" class="form-control" id="fromdate" name="fromdate">

                        <label for="To">To</label>
                        <input type="date" class="form-control" id="todate" name="todate">
                    
                    </div>
                        
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
             </div>
           </div>
    </div>

    <div class="col-md-4">
          <div class="card bg-dark text-white" style="width: 100%">
               <div class="card-body"> 
            <h2 class="mt-12 text-center">Search Candidate By date</h2>
       
                <form action="{{ route('tech') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <select class="form-control" id="technology" name="technology"  >
                           @foreach($tech as $techs)
                             <option value="{{$techs->technology}}">{{$techs->technology}}</option>
                          @endforeach 
                        </select>
                    </div><br><br><br>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
             </div>
           </div>
    </div>
</div>
<br><br>
<div align="center"><br>
        <a href="{{route('hrdashboard')}}" class="btn btn-danger">BACK</a>
        </div> <br>

</body>
</html>