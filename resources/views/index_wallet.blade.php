@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wallet list<span class="float-right"><a href='/location' class="btn btn-secondary">Go Back</a></div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        <table class="table table-striped table-hover" border="1">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Amount</th>
                        <th>Paid in</th>
                        <th>Paid out</th>
                        <th>Paid total</th>
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
                        @endsection