@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wallet list<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a></div>

                <div class="card-body">
                    <div class="list-group">

                        <table class="table table-striped table-hover" border="1">
                        Finished sales
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Amount</th>
                        <th>Paid in</th>
                        <th>Paid out</th>
                        <th>Total</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                        @if(count($sales))
                        @foreach ($sales as $sale)
                        <tr> 
                        <td>{{ $sale->location_id }}</td>
                        <td>{{$sale->amount}}</td>
                        <td>{{$sale->paid_in}}</td>
                        <td>{{$sale->paid_out}}</td>
                        <td>{{$sale->paid_total}}</td>
                        <td>{{$sale->created_at}}</td>
                        </tr>
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No events found!</p>
                        @endif
                        </div>
                        </div>  
                        </div>
                        </div>  
                           
                        <table id="myDIV" style="display:none;" class="table table-striped table-hover" border="1">
                        {{$sale->paid_total - $sale->paid_in}}
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Paid In</th>
                        <th>Paid Out</th>
                        <th>Notes</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($wallets as $wallet)
                        <tr> 
                        <td>{{ $wallet->location_id }}</td>
                        <td>{{$wallet->paid_in}}</td>
                        <td>{{$wallet->paid_out}}</td>
                        <td>{{$wallet->info}}</td>
                        <td>{{$wallet->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>

                        <button class="btn btn-primary" style="width:100px;" onclick="myFunction()">Payments</button>
                        <br>

                           
                        @endsection
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