@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cashier<span class="float-right"><a href='/location' class="btn btn-secondary">Back</a>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                        <div class="card-body">
                        
                        <div class="form-group">
                        <div class="list-group-item">
                            

                        </div>     
                        <form method="post" action="/make">
                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">
                        <label for="info">Location:{{$locations->location_name}}</label><br>
                        <input type="hidden" class="form-control" name="location" id="location" value="{{$locations->location_name}}">
                        <label for="info">Start cash:</label>
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$locations->start_cash}}">                 
                        <label for="info">End cash:</label>
                        <input type="number" class="form-control" name="end_cash" id="end_cash" value="{{$orders->sum('total')}}" readonly>
                        <!-- <label for="info">Date:</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{date("Y-m-d")}}"> -->
                        
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