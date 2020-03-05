@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Drawer report<span class="float-right">
                <div class="noprint">
                <a href='/location' class="btn btn-secondary">Back</a>
                </div>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                        <div class="card-body">
                        
                        <div class="form-group">
                        <div class="list-group-item">
                        <label for="location">Location: {{$loc->location_id}}</label>
                        </div>     
                        <form method="post" action="/post_drawer">
                        @csrf           
                        <br>
                        <input type="hidden" name="location_id" id="location_id" value="{{$loc->location_id}}">

                        <label for="info">Starting cash</label>
                        @foreach($sales as $sales)
                        @if($loop->last)
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$sales->paid_total}}" onchange="add_number()" readonly>
                        @endif
                        @endforeach
                       <br>
                        <label for="info">Orders:</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="{{$locations->sum('total')}}" onchange="add_number()" readonly>
                        <br>
                        <label for="info">Paid In/Out:</label>
                        <input type="number" class="form-control" name="paid_in" id="paid_in" value="{{$wallets->sum('pay_in')}}" onchange="add_number()" readonly>
                        <div>
                        <hr style="width:100%;">
                        <label for="info">Total:</label>
                        <input type="number" class="form-control" name="paid_total" id="paid_total" readonly>
                        <br>
                        <table class="table table-striped table-hover" border="1">
                        <thead>
                        <tr>
                        <th>Paid In/Out</th>
                        <th>Info</th>
                        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($wallets))

                        @foreach ($wallets as $wallet)
                        <tr> 
                        <td>{{ $wallet->pay_in }}</td>
                        <td>{{$wallet->info}}</td>
                        <td>{{$wallet->created_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <p>No payments found!</p>
                        @endif
                        </tbody>
                        </table>
                        <span class="float-left">                
                        </span>
                        </div>
                        </div>
                        <br>
                        <div class="noprint">
                        <span class="float-left">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Make a payment</button>

                        </span>
                        <span class="float-right">
                        <!-- <button type="button" class="btn btn-primary" onclick ="disable()">Close drawer</button> 
                        <button type="button" class="btn btn-success" onclick="myFunction()">Print</button> -->
                        <!-- <button type="submit" class="btn btn-primary">Close drawer</button> -->
                        <a type="submit" href="/location/{{ $loc->id }}" class="btn btn-primary float-right" >Close drawer</a>

                        </td>
                        </form>  
                        <br> 
                        
 <!-- Modal Pay In/Out-->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Make a payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="/make">
                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">
                        <input type="hidden" name="location_id" id="location_id" value="{{$loc->location_id}}">
                            <label for="paid_in">Make a Pay In/Out:</label>
                        <input type="number" class="form-control" name="pay_in" id="pay_in">
                        <label for="info">Info:</label>
                        <input type="text" class="form-control" name="info" id="info">     
                        </div>
                        <br>
                        <div>
                        <span class="float-left">                
                        </span>
                        </div>
                        </div>
                        <br>
                        <span class="float-right">
                        <input type="submit" class="btn btn-primary">
                        </span>
                        </form>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <style>
                    .noprint
                            {
                                color:black;
                            }
                            @media print {
                                p
                                {
                                    color:green;
                                }
                                .noprint {
                                    display: none;    
                                }
                            }
                            </style>
                            <script>
                    var panel = document.getElementById("content");
                                var el = document.querySelector( '.noprint' );
                                panel.removeChild(el);
                                var printWindow = window.open('', '', 'height=400,width=800');
                                printWindow.document.write('<html><head><title>DIV Contents</title>');
                                printWindow.document.write('</head><body >');
                                printWindow.document.write(panel.innerHTML);
                                printWindow.document.write('</body></html>');
                                printWindow.document.close();
                                setTimeout(function () {
                                    printWindow.print();
                                }, 500);
                                return false;
                            }
                    </script>
                    <script>
                    $(function() {
                        $('.form-control').change(function() {
                            var paid_total = 0;

                            $('.form-control').each(function() {
                                if( $(this).val() != '' )
                                    paid_total += parseInt($(this).val());
                            });
                            $('#totalvalue').text(paid_total);
                        })
                        // trigger initial calculation
                        .change();
                    }); 
                    </script>
                    <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("start_cash").value);
var second_number = parseInt(document.getElementById("amount").value);
var third_number = parseInt(document.getElementById("paid_in").value);
// var fourth_number = parseInt(document.getElementById("amount").value);


var result = first_number + second_number + third_number;

document.getElementById("paid_total").value = result;
}
</script>
<script> 
                        function disable() { 
                        document.getElementById('start_cash').readOnly 
                        = true;
                        document.getElementById('amount').readOnly 
                        = true; 
                        document.getElementById('paid_in').readOnly 
                        = true; 
                        document.getElementById('paid_total').readOnly 
                        = true; 
                            } 
                        </script>  
@endsection
<!-- <script>
function function() {

var btn = document.getElementById("button");

if (btn.value == "Open drawer") {
    btn.value = "Close";
    btn.innerHTML = "Close";
}
else {
    btn.value = "Open drawer";
    btn.innerHTML = "Open drawer";
}

}
</script> -->