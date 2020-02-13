@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cashier<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a>
                </div>                                  
                <div class="card-body" onmouseover="add_number()">
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
                        <br>
                        <label for="info">Start cash</label>
                        <input type="number" onmouseover="add_number()" class="form-control" name="start_cash" id="start_cash" value="{{$wallets->sum('start_cash')}}" readonly>
                        
                        <label for="info">Amount of orders(today):</label>
                        <input type="number" onmouseover="add_number()" class="form-control" name="amount" id="amount" value="{{$locations->sum('total')}}" readonly>
                        <br>
                       
                        <br>
                        <br>
                       
                        
                        <input type="hidden" onmouseover="add_number()" class="form-control" name="location_id" id="location_id" value="{{$loc->location_id}}">
                        <label for="info">Paid in:</label>
                        <input type="number" onmouseover="add_number()" class="form-control" name="paid_in" id="paid_in" value="{{$wallets->sum('paid_in')}}" readonly>
                        <label for="info">Paid Out:</label>
                        <input type="number" onmouseover="add_number()" class="form-control" name="paid_out" id="paid_out" value="{{$wallets->sum('paid_out')}}" readonly>
                        <div>
                        <label for="info">Total:</label>
                        <input type="number" onmouseover="add_number()" class="form-control" name="paid_total" id="paid_total" readonly>
                        
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
    <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("start_cash").value);
var second_number = parseInt(document.getElementById("paid_in").value);
var third_number = parseInt(document.getElementById("paid_out").value);
var fourth_number = parseInt(document.getElementById("amount").value);


var result = first_number + second_number - third_number + fourth_number;

document.getElementById("paid_total").value = result;
}

</script>
@endsection

