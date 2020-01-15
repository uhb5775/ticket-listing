@extends('layouts.app')

@section ('content')
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Edit Event<span class="float-right"><a href='/home' class="btn btn-secondary">Back</a></span></div>
  <div class="card-body">
  
  @if(session('status'))
  <div class="alert alert-success" role="alert">
  {{session('status')}}
  </div>
  @endif
            
<form method="post" action="/listings/{{ $listing->id }}">
@csrf
@method('PUT')
<div class="form-group" >
    <label for="agent">Event name</label>
    <input type="text" class="form-control" name="event" id="event" placeholder="Name" value="{{ $listing->event }}">
  </div>
  <!-- <div class="form-group">
    <label for="quantity">Event date</label>
    <input type="datetime-local" class="form-control" name="date" id="date">
  </div>
  <div class="form-group" >
    <label for="price">Price</label>
    <input type="number" class="form-control" name="price" id="price" placeholder="Price">
  </div>
  <div class="form-group">
  <label for="text">Info</label>
  <input type="text" class="form-control" name="info" id="info" placeholder="Notes" style="height:100px;">
</div>
  <div class="form-group">
    <label for="total">Total</label>
    <input type="number" class="form-control" name="total" id="total" placeholder="total">
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
                   </div>
                  </div>
                 </div>

@endsection