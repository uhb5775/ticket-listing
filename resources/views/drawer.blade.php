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
                        <div class="list-group-item">
                        <div class="card-body">
                        
                        </div>     
                        <form method="post" action="/make">
                        <!-- <form method="post" action="/post_drawer"> -->

                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">
                        <select class="form-control" name="location_id" id="location_id">
                        @if($locations->count() > 0)
                        @foreach($locations as $location)
                        <option>{{$location->location_id}}</option>
                        @endForeach
                        @else
                        No Record Found
                            @endif
                            </select>
               
                        <br>
                        <label for="paid_id">Enter start cash:</label>
                        <input type="number" onKeyUp="add_number();" class="form-control" name="start_cash" id="start_cash">
                        <br>

                            <label for="paid_id">Paid in:</label>
                        <input type="number" onKeyUp="add_number();" class="form-control" name="paid_in" id="paid_in">
                        <label for="info">Paid out:</label>
                        <input type="number" onKeyUp="add_number();" class="form-control" name="paid_out" id="paid_out">
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
                        <input type="submit" onmouseover="add_number()" class="btn btn-primary">
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("paid_in").value);
var second_number = parseInt(document.getElementById("paid_out").value);
var result = first_number + second_number;

document.getElementById("paid_total").value = result;
}

</script> -->