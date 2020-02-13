@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div onmouseover="add_number()" class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cashier<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">      

                        <form method="post" action="/make">
                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">
                       
                        @foreach ($locations as $location) 
                        <div class="list-group-item">
                       {{ $location->location_id }}
                        </div>
                        @endforeach
                        <label for="info">Start cash:</label>
                        <input type="number" class="form-control" name="start_cash" id="start_cash">                 
                        <label for="info">End cash:</label>
                        <input type="number" onKeyUp="add_number(); add_number();" class="form-control" name="end_cash" id="end_cash">                 
                        <br>
                        @if(count($orders))
                        <div class="list-group">
                        @foreach ($orders as $order) 
                        <div class="list-group-item">
                       <a href="/">{{ $order->price }}: {{ $order->location }}</a>
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No events found!</p>
                        @endif
                        {{$order->price}}
                        <span class="float-right">
                        <input type="submit" onmouseover="add_number()" class="btn btn-primary">
                        </span>
                        <br><br>
                        </div>
                        </div>
                        </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <label for="info">Date:</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{date("Y-m-d")}}"> -->
                         <!-- <button type="button" onclick="myFunction();" class="btn btn-success">Show total</button>
                        <div style="display:none;" id="myDIV">-->
    <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("start_cash").value);
var second_number = parseInt(document.getElementById("end_cash").value);
var result = first_number + second_number;

document.getElementById("total").value = result;
}

</script>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
@endsection