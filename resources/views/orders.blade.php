@extends('layouts.app')
@section('content')        
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="application/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=0.9">
  <title>Data</title>
      <div class="container">
   <h2>Data</h2>
   <br>
   <div class="row">
    <div class="form-group col-md-6">
    <h5>Start Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-6">
    <h5>End Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
    </div>
    <div class="text-left" style="
    margin-left: 15px;
    ">
    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
    </div>
    </div>
    <br>
    <div class="table-responsive">

    <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Agent</th>
                     <th>Event</th>
                     <th>Price</th>
                     <th>Qty</th>
                     <th>Total</th>
                     <th>Date</th>
                  </tr>
               </thead>
               <tfoot>
        <tr>
            <th colspan="4" style="text-align:right">Total:</th>
            <th></th>
        </tr>
    </tfoot>
            </table>
         </div>
         </div>
   <script>
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;};
 //
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
//
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 //
            $( api.column( 5 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        },
           processing: true,
           serverSide: true,
           pageLength: 20,
           ajax: {
          url: "{{ url('orders-list') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },       
           columns: [
                    { data: 'ename', name: 'ename' },
                    { data: 'event', name: 'event', render:function(data, type, row){
    return "<a href='/orders/"+ row.id +"'>" + row.event + "</a>"
}},
                  { data: 'price', name: 'price' },
                  { data: 'quantity', name: 'quantity' },
                  { data: 'total', name: 'total' },
                  { data: 'created_at', name: 'created_at' }
                 ]
        });
     });
     $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
  </script>
   <tfoot>
        <tr>
            <th colspan="4" style="text-align:right">Total:</th>
            <th></th>
        </tr>
    </tfoot>
@endsection