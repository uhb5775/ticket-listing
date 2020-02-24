@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Locations list<span class="float-right">
                <a href='/location/create/' class="btn btn-primary">Add location</a>
                <a href='/' class="btn btn-secondary">Back</a>
                </div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        @if(count($locations))
                        <div class="list-group">
                        @foreach ($locations as $location) 
                        <div class="list-group-item">
                       <!-- <a href="/wallet/{{$location->id}}">{{ $location->location_id }}</a> -->
                       <a href="/location/{{$location->id}}/up">{{ $location->location_id }}</a>
                       <form class="float-right ml-2" action="/location/{{ $location->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="button" class="btn btn-danger">Delete</button>
                        </form>
                       <!-- <a href="/location/{{ $location->id }}/edit" class="btn btn-info float-right">Edit</a></td> -->
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