@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cashier<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                        <div class="card-body">
                        <!-- Button set start cash -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Input start cash
                        </button>
                        <!-- Modal  start cash-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input starting cash</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="/make" name="firstform" id="form1">
                        @csrf
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
                        <label>USD $</label>
                        <input type="number" class="form-control" name="start_cash" id="start_cash">
                        <input type="hidden" class="form-control" name="info" id="info"value="Starting cash">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        </div>
                        </div>
                        </div>
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
        <input type="number" class="form-control" name="sc" id="sc" onblur="add_number()">
        <input type="number" class="form-control" name="cs" id="cs" onblur="add_number()">
        <input type="number" class="form-control" name="paid_total" id="paid_total">



    </div>
    <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("sc").value);
var second_number = parseInt(document.getElementById("cs").value);
// var third_number = parseInt(document.getElementById("paid_out").value);
// var fourth_number = parseInt(document.getElementById("amount").value);


var result = first_number + second_number;

document.getElementById("paid_total").value = result;
}

</script>
@endsection