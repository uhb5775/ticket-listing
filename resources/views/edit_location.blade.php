@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Drawer report<span class="float-right">
                <div class="noprint">
                <button type="button" onclick="myFunction()" class="btn btn-success">Print</button>
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
                     
<!-- <a href="{{action('LocationsController@update', $loc->id)}}">Link name/Embedded Button</a> -->

                        <form method="post" action="/post_drawer">
                        @csrf           
                        <br>
                        <input type="hidden" name="location_id" id="location_id" value="{{$loc->location_id}}">
                        <label for="info">Starting cash</label>
                 
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$wallets->sum('start_cash')}}" onchange="add_number()" readonly>   
                        <label for="info">Orders:</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="{{$locations->sum('total')}}" onchange="add_number()" readonly>
                        <label for="info">Paid In:</label>
                        <input type="number" class="form-control" name="paid_in" id="paid_in" value="{{$wallets->sum('pay_in')}}" onchange="add_number()" readonly>
                        <label for="info">Paid Out:</label>
                        <input type="number" class="form-control" name="paid_out" id="paid_out" value="{{$wallets->sum('pay_out')}}" onchange="add_number()" readonly>
                        <div>
                        <hr style="width:100%;">
                        <label for="info">Total:</label>
                        <input type="number" class="form-control" name="paid_total" id="paid_total" readonly>
                        <br>
                        <table class="table table-striped table-hover" border="1">
                        <thead>
                        <tr>
                        <th>Paid In</th>
                        <th>Paid Out</th>
                        <th>Info</th>
                        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($wallets))

                        @foreach ($wallets as $wallet)
                        <tr> 
                        <td>{{ $wallet->pay_in }}</td>
                        <td>{{ $wallet->pay_out }}</td>
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
                        <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">Enter start cash</button> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Pay in</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Pay out</button>
                        </span>
                        <span class="float-right">
                        <button type="submit" class="btn btn-primary" >Close drawer</button>
                        <a class="btn btn-primary" href="{{action('LocationsController@update', $loc->id)}}">Start new</a>

                        <!-- <button type="button" href="/location/{{ $loc->id }}" class="btn btn-secondary">Print</button> -->
                        <!-- <button type="button" onclick="myFunction()" class="btn btn-success">Print</button> -->
                        </td>
                        </form>  
                        <br> 
                        <!-- Modal Startcash-->
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Set start cash</h5>
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
                            <label for="paid_in">Enter start cash:</label>
                        <!-- <input type="number" class="form-control" name="pay_in" id="pay_in"> -->
                        @foreach($sales as $sales)
                        @if($loop->last)
                        <input type="number" class="form-control" name="start_cash" id="start_cash" placeholder="{{$sales->paid_total}}">
                        @endif
                        @endforeach   
                        <input type="hidden" class="form-control" name="info" id="info" value="start cash">     
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
 <!-- Modal Pay In-->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pay in</h5>
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
                            <label for="paid_in">Make a Pay In:</label>
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
                                        <!-- Modal Pay Out-->
 <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pay out</h5>
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
                            <label for="paid_out">Make a Pay Out:</label>
                        <input type="number" class="form-control" name="pay_out" id="pay_out">
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
var fourth_number = parseInt(document.getElementById("paid_out").value);


var result = first_number + second_number + third_number - fourth_number;

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
                        document.getElementById('paid_out').readOnly 
                        = true; 
                        document.getElementById('paid_total').readOnly 
                        = true; 
                            } 
                        </script>  
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
                        </span>
                        </form>
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
<!-- reset cash
<form method="post" action="/location/{{ $loc->id }}">
@csrf
@method('PUT')
<div class="form-group" >
    <label for="agent">Event name</label>
fdgdf  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->