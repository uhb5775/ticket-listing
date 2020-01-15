@extends('layouts.app')

@section ('content')
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Create Event<span class="float-right"><a href='/home' class="btn btn-secondary">Back</a></span></div>
  <div class="card-body">
  
  @if(session('status'))
  <div class="alert alert-success" role="alert">
  {{session('status')}}
  </div>
  @endif
            
<!-- <form method="post" action="/listings"> -->
<form method="post" action="/listings">

@csrf
  <!-- <div class="form-group" >
    <label for="agent">Agent</label>
    <input type="text" class="form-control" name="agent" id="agent" placeholder="Name">
  </div> -->
  <div class="form-group">
    <label for="quantity">Event name</label>
    <input type="text" class="form-control" name="event" id="event" placeholder="Event">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
                   </div>
                  </div>
                 </div>

@endsection