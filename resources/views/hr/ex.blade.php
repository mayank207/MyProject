<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>



</head>
  <body>
    
      <div align="center" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Technology's List</h5>
                <h4 class="card-title">Our Company Technology's</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" border="1" id="example">
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
 </body>
</html>