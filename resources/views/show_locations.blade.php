@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show agents<span class="float-right"><a href='/orders' class="btn btn-secondary">Go Back</a></div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        @if(count($locations))
                        <div class="list-group">
                        @foreach ($locations as $location) 
                        <div class="list-group-item">
                       <a href="/agent/">{{ $location->location_name }}</a>
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
        </div>
    </div>
@endsection  