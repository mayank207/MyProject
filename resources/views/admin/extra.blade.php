       <div class="row input-daterange my-5">
        <div class="col-md-4">
            <input type="date" name="start_date" id="start_date" class="form-control border border-primary" placeholder="From Date" />
        </div>
        <div class="col-md-4">
            <input type="date" name="end_date" id="end_date" class="form-control border border-primary" placeholder="To Date" />
        </div>
        <div class="col-md-4">
            <div class="btn-group">
            <button type="button" name="filter" id="Generate" class="btn btn-primary">Filter</button>
            <button type="button" name="refresh" id="reset" class="btn btn-default">Refresh</button>
            </div>
                     </div>
          </div>
              <div class="card-body">
                <div class="table-responsive">
               
                  {!! $dataTable->table() !!}
                  {!! $dataTable->scripts() !!}

                </div>
              </div>
   <script>
    const table=$('#category-table');
    table.on('preXhr.dt',function(e,settings,data){
       data.start_date=$('#start_date').val();
       data.end_date=$('#end_date').val();
    });
    $('#Generate').on('click',function(){
        table.DataTable().ajax.reload();
        return false;
    });
    $('#reset').on('click',function(){
        $('#start_date').val(" ");
        $('#end_date').val(" ");
       table.on('preXhr.dt',function(e,settings,data){
       data.start_date='';
       data.end_date='';
       });
       table.DataTable().ajax.reload();
        return false;
    });
   
</script>