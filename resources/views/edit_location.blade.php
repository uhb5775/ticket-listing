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
  {{$locations->location_id}}
<form method="post" action="/location/{{ $locations->id }}">
@csrf
@method('PUT')
<div class="form-group" >
                        <div class="list-group-item">
                        <input type="hidden" class="form-control" name="location_id" id="location_id" value="{{$locations->location_id}}" readonly>
                
                        <label for="info">Start cash:</label>
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$locations->start_cash}}" readonly>  
                        <label for="info">Amount:</label>
                        <input type="number" class="form-control" name="end_cash" id="end_cash" value="{{$loc->sum('total')}}" readonly>                 
                        <label for="in">Paid in:</label>
                        <input type="number" class="form-control" name="paid_in" id="paid_in" value="{{$locations->paid_in}}">
                        <label for="in">Paid out:</label>
                        <input type="number" class="form-control" name="paid_out" id="paid_out" value="{{$locations->paid_out}}">
                        
                        </div></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- value="{{$orders->sum('total')}}" -->
</form>
                    </div>
                   </div>
                  </div>
                 </div>

@endsection