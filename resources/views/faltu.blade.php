<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
<div class="container">

    <div id="tag_container">
           @include('presult')
    </div>
</div>

<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0){
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });

    });

    function getData(page){
        $.ajax({
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>

</body>
</html>
















{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet">
</head>
<body style="margin:100px 0px !important;">
    <select name="" id="cat">
        @foreach ($all as $item)
            <option value="{{$item->id}}">{{$item->name }}</option>
        @endforeach
    </select><br>

    <input type="date" id="datepicker_from">
    <input type="date" id="datepicker_to">
    <button id="search">Search</button>
    <table class="datatable mdl-data-table dataTable" cellspacing="0"
    width="100%" role="grid" style="width: 100%;">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js"></script>
<script>

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var categoryDetails = $('.datatable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': $.fn.dataTable.pipeline({
                    type:'post',
                    url:"{{ route('serverSide') }}",
                }),
                'columns':[
                    {"data":'id',"name":'id'},
                    {"data":'name',"name":'name'},
                ]
            });


            $('#search').on('click',function(){
                var a=$('#datepicker_from').val();
                var b=$('#datepicker_to').val();
                minDateFilter = new Date(a).getTime();
                maxDateFilter = new Date(b).getTime();
                c.draw();
            });


        $('#cat').on('change',function(){
            c.column(0).search(this.value).draw();
        });







});
</script>
</body>
</html> --}}
