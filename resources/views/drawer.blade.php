@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Start cash<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                        <div class="card-body">
                        
                        <form method="post" action="/start">
                        <!-- <form method="post" action="/post_drawer"> -->
                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">
                        <label for="location">Select location:</label>
                        <select class="form-control" name="location_id" id="location_id">
                        @if($locations->count() > 0)
                        @foreach($locations as $location)
                        <option>{{$location->location_id}}</option>
                        @endForeach
                        @else
                        No Record Found
                            @endif
                            </select>
                        @csrf           
                        <br>
                   
                            <label for="start">Enter a starting cash:</label>
                        <!-- <input type="number" class="form-control" name="pay_in" id="pay_in"> -->
                        <input type="number" class="form-control" name="start_cash" id="start_cash">
                        <input type="hidden" class="form-control" name="info" id="info" value="start cash">     
                        </div>
                        <br>
                        <div>
                        <span class="float-left">                
                        </span>
                        </div>
                        </div>
                        <br>
                        <span class="float-right">
                        <input type="submit" class="btn btn-primary">
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection