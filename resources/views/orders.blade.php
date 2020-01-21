@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orders list<span class="float-right"><a href='/' class="btn btn-secondary">Back</a></span></div>

                <div class="card-body">
                        @if(count($orders))
                        <div class="list-group">
                        @foreach ($orders as $order) 
                        <div class="list-group-item">
                        <a href="/orders/{{ $order->id }}">Invoice № {{ $order->id }}</a>     {{ $order->event }}    Created at: {{ $order->created_at }}
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No orders found!</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection