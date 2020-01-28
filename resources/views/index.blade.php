@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/custom.css">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Events list<span class="float-right"><a href='/listings/create' class="btn btn-secondary">Add event</a></span></div>

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
                        <a href="/agent/" class="btn btn-success">Add agent</a>
                        <a href="/location/" class="btn btn-success">Add location</a>
                        <a href="/home/" class="btn btn-primary">Edit event</a>
                       <a href="/orders/" class="btn btn-secondary">Show orders</a>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
