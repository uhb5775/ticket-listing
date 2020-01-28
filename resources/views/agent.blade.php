@extends('layouts.app')

@section ('content')
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Create Agent<span class="float-right"><a href='/home' class="btn btn-secondary">Back</a></span></div>
  <div class="card-body">
  
  @if(session('status'))
  <div class="alert alert-success" role="alert">
  {{session('status')}}
  </div>
  @endif
            
<!-- <form method="post" action="/listings"> -->
<form method="post" action="/agent">

@csrf
  <div class="form-group" >
    <label for="agent_name">Agent</label>
    <input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Name">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
                   </div>
                  </div>
                 </div>

@endsection
<!-- test -->