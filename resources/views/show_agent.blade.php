@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show agents<span class="float-right"><a href='/orders' class="btn btn-secondary">Go Back</a></div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        @if(count($agents))
                        <div class="list-group">
                        @foreach ($agents as $agent) 
                        <div class="list-group-item">
                       <a href="/agent/">{{ $agent->agent_name }}</a>
                       <form class="float-right ml-2" action="/agent/{{ $agent->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="button" class="btn btn-danger">Delete</button>
                        </form>
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