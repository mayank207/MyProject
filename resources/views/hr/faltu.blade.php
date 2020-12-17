<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        .active
        {
            background-color: blue;
            color: #fff;
        }
        th,button
        {
            cursor: pointer;
        }

        button,input[type='submit']
        {
            transition: 0.5s;
        }
        input[type='search']
        {
            border-radius: 20px;
        }
        .page,button,input[type='submit']
        {
            margin-right: 1em;
            padding: 5px 30px;
            outline: none !important;
            border:none !important;
            border-radius: 35px;
        }
        .page:hover,button:hover,input[type='submit']:hover
        {
            background-color: blue;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container p-5">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Category
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  id="save">
              <div class="form-group">
                  <label for="">Category</label>
                <input type="text" name="name" id="name" placeholder="Enter Category" class="form-control">
                <span id="error" class="text-danger"></span>
              </div>

              <button class="btn btn-primary">Save</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="update">
              <div class="form-group">
                  <label for="">Category</label>
                <input type="text" name="name" id="update-name" placeholder="Enter Category" class="form-control">
                <span id="updateerror" class="text-danger"></span>
              </div>
              <input type="hidden" id="category_id" value="">
              <button class="btn btn-primary">Update</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<button id="etp">Export To PDF</button>

        <input type="search" name="" id="search" placeholder="Search Here" class="form-control float-right my-2 px-3">
        <div class="clearfix"></div>
        <form method='post' action='{{ route("export")}}' class="my-3 float-right">
            {{ csrf_field() }}
            <input type="submit" name="exportexcel" value='Excel'>
            <input type="submit" name="exportcsv" value='CSV'>
            <input type="submit" name="exportpdf" value="PDF">
            <input type="hidden" name="page" id="current_page" value="">
          </form>

        <table class="table border text-center" id="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="btn-group float-right mb-5">
            <button id="previous">Previous</button>
            <div class="pagination">
            </div>
            <button id="next">NEXT</button>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function(){
            var data='';
            var current_page='';
            var page=1;
            var next_page='';
            var prev_page='';
            var total=0;

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $('th').click(function(){
                var table=$(this).parents('table').eq(0);
                var rows=table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
                // console.log(table.find('tr:gt(0)'));
                this.asc=!this.asc;
                if(!this.asc){
                    rows=rows.reverse();
                }
                for(var i=0;i<rows.length;i++){
                    table.append(rows[i]);
                }
            });

            function comparer(index){
                return function(a,b){
                    var valA=getCellValue(a,index),valB=getCellValue(b,index);
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA-valB:valA.toString().localeCompare(valB);
                }
            }

            function getCellValue(row,index){
                return $(row).children('td').eq(index).text();
            }

            fetchpage(page);

            $('#search').on('keyup',function(){
                var search= $(this).val().toLowerCase();
                searchMy(search);
            });

            function searchMy(search)
            {
                $('tbody tr').filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(search)>-1);
                });
            }

            function fetchpage(page)
            {
                $('tbody,.pagination').empty();
                $.ajax({
                    type:'get',
                    url:"{{ route('getalldata') }}",
                    data:{
                        page:page
                    },
                    success:function(data){
                        current_page=data.current_page;
                        $('#current_page').val(current_page);
                        next_page=data.next_page;
                        prev_page=data.prev_page;
                        total=data.total;
                        // console.log(total);

                        if(data.next_page==null){
                            $('#next').hide();
                        }
                        else{
                            $('#next').show();
                        }
                        if(data.prev_page!=null){
                            $('#previous').show();
                        }
                        else{
                            $('#previous').hide();
                        }

                        for(var i=0;i<data.data.length;i++)
                        {

                                $('table').append('<tr><td>'+data.data[i].id+'</td><td>'+data.data[i].technology+'</td><td><a href=""><i class="fa fa-eye"></i></a><button class="delete-btn" data-id='+data.data[i].id+'>Delete</button><button class="update-btn" data-id='+data.data[i].id+'>Update</button></td></tr>');

                        }
                        for(var j=1;j<=data.last_page;j++)
                        {

                            if(current_page==j){
                                $('.pagination').append('<button class="active page" data-page="'+j+'">'+j+'</button>');
                            }
                            else{
                                $('.pagination').append('<button class="page" data-page="'+j+'">'+j+'</button>');
                            }
                        }
                    }
                });
            }

            // Next and Previous Button
            $('#next').on('click',function(){
                fetchpage(current_page+1);
            });
            $('#previous').on('click',function(){
                fetchpage(current_page-1);
            });
            //  Pagination Change
            $(document).on('click','.page',function(){
                var page=$(this).attr('data-page');
                fetchpage(page);
            });
            // Delete Category
            $(document).on("click",".delete-btn",function(){
                var current=$(this);
                if(confirm('Are you sure you want to delete ?'))
                {
                    var categoryId=$(this).data('id');
                    $.ajax({
                        url:"{{url('cat')}}/"+categoryId,
                        type:"DELETE",
                        success:function(data){
                            var r=JSON.parse(data);
                            if(r.success==true){
                                fetchpage(current_page);
                            }
                            else if(r.success==false){
                                alert(r.message);
                            }

                        }
                    });
                }
                else
                {
                    return false;
                }

            });
            // Save Category
            $('#save').submit(function(e){
                var category=$('#name').val();
                $('#error').html(' ');
                e.preventDefault();
                $.ajax({
                    url:'{{route("save")}}',
                    method:'POST',
                    data:{
                            category:category,
                    },
                    success:function(response){
                        console.log(response);
                        var r=JSON.parse(response);
                        if(r.success==true)
                        {
                            $('#exampleModal').modal('hide');
                            fetchpage(current_page);
                        }
                        else if(r.success==false)
                        {
                            $('#error').html(r.data.name);
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                    });
            });
            // Update Model Manage
            $(document).on('click','.update-btn',function(){
                var category_id=$(this).data('id');
                $('#updateModel').modal('show');
                $('#update-name').val('aaa');
                $.ajax({
                        type:'get',
                        url:"{{ route('fetchsingle') }}",
                        data:{
                            categoryid:category_id
                        },
                        success:function(data){
                            var r=JSON.parse(data);
                            $('#update-name').val(r.data.name);
                            $('#category_id').val(r.data.id);
                        }
                    });
            });
            //  Update Daata
            $('#update').submit(function(e){
                // $('#error').html(' ');
                e.preventDefault();
                var category=$('#update-name').val();
                var id=$('#category_id').val();

                $.ajax({
                    url:'{{route("update")}}',
                    method:'POST',
                    data:{
                        category:category,
                        id:id,
                    },
                    success:function(response){
                        console.log(response);
                        var r=JSON.parse(response);
                        if(r.success==true)
                        {
                            $('#updateModel').modal('hide');
                            fetchpage(current_page);
                        }
                        else if(r.success==false)
                        {
                            $('#updateerror').html(r.data.name);
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                    });
            });

        });

    </script>
</body>
</html>