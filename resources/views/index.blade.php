@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/custom.css">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Events list<span class="float-right">
            <a href="/home/" class="btn btn-secondary">Edit events</a>
            </div>

                <div class="card-body">
                        @if(count($listings))
                        <div class="list-group">
                        @foreach ($listings as $listing) 
                        <div class="list-group-item">
                       <a href="/listings/{{ $listing->id }}">{{ $listing->event }}</a>
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No events found!</p>
                        @endif
                </div>
                <div class="card-body">
                        <div class="list-group">
                        <div class="list-group-item">
                        <a href="/agent/show_agent/" class="btn btn-primary">Agents</a>
                        <a href="/location/" class="btn btn-primary">Locations</a>
                       <a href="/orders/" class="btn btn-primary">Orders</a>
                       <!-- <a href="/drawer/" class="btn btn-primary">Pay In/Out</a> -->

                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
