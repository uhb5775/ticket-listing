@extends('layouts.app')

@section ('content')
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Start day<span class="float-right"><a href='/home' class="btn btn-secondary">Back</a></span></div>
  <div class="card-body">
  
  @if(session('status'))
  <div class="alert alert-success" role="alert">
  {{session('status')}}
  </div>
  @endif
            
<form method="post" action="/location/{{ $locations->id }}">
@csrf
@method('PUT')
<div class="form-group" >
                        <div class="list-group-item">
                        <input type="text" class="form-control" name="location_name" id="location_name" value="{{$locations->location_name}}">
                        <label for="info">Start cash:</label>
                        <input type="number" class="form-control" name="start_cash" id="start_cash">  
                        <!-- value="{{$locations->start_cash}}                -->
                        <!-- <label for="info">Income:</label>
                        <input type="number" class="form-control" name="income" id="income" value="{{$orders->sum('total')}}">
                        <label for="info">End cash:</label>
                        <input type="number" class="form-control" name="end_cash" id="end_cash"> -->
                        </div></div>
                        <button type="submit" class="btn btn-primary">Submit</button>

</form>
                    </div>
                   </div>
                  </div>
                 </div>

@endsection