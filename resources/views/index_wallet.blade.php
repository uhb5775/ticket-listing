@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wallet list<span class="float-right"><a href='/location' class="btn btn-secondary">Go Back</a></div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        @if(count($wallets))
                        <div class="list-group">
                        @foreach ($wallets as $wallet) 
                        <div class="list-group-item">
                        Location:   {{ $wallet->location }} |  Cash:{{$wallet->end_cash}} |  Date:{{$wallet->created_at}}

                       <!-- <a href="/wallet/{{$wallet->id}}">Start cash:{{ $wallet->start_cash }}</a> End cash:{{$wallet->end_cash}} -->
                       
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No events found!</p>
                        @endif
                </div>     
               
@endsection