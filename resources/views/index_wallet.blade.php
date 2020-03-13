@extends('layouts.app') @section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Closed drawers<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a></div></span>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-hover" border="1">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Orders $</th>
                                    <th>Paid In/Out</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->location_id }}</td>
                                    <td>{{$sale->amount}}</td>
                                    <td>{{$sale->paid_in}}</td>
                                    <td>{{$sale->paid_total}}</td>
                                    <td>{{$sale->created_at}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </table>
    {{$sales->links()}} 
    @endsection