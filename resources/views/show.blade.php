@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make order<span class="float-right"><a href='/' class="btn btn-secondary">Back</a>
                <!-- <button class="btn btn-warning" onclick="myFunction()">Print</button> -->
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            Event: {{ $listings->event }}
                        </div>
                        <form method="post" action="/orders">
                        @csrf           
                        <br>
                        <div class="form-group">
                        <div class="list-group-item">

                        <input type="hidden" class="form-control" id="event" name="event" value="{{ $listings->event }}">
                        <label for="ename">Agent</label>
                        <select class="form-control" name="ename" id="ename">
                        @if($agents->count() > 0)
                        @foreach($agents as $agent)
                        <option>{{$agent->agent_name}}</option>
                        @endForeach
                        @else
                        No Record Found
                            @endif   
                        </select>
                        <br>
                        <label for="location">Choose location</label>
                        <select class="form-control" name="location" id="location">
                        @if($locations->count() > 0)
                        @foreach($locations as $location)
                        <option>{{$location->location_name}}</option>
                        @endForeach
                        @else
                        No Record Found
                            @endif   
                        </select>
                        <br>
                        <label for="info">Info:</label>
                        <input type="text" class="form-control" name="info" id="info" placeholder="Notes">
                        <br>
                        <label for="price">Price $:</label>
                        <input type="currency" class="form-control" name="price" id="price" placeholder="$" onKeyUp="sum()">
                        </div>
                        <div class="form-control" name="date" id="date">
                        Order Date: {{date("Y-m-d")}}
                        </div>
                        <br>
                        <div>
                        <span class="float-left">
                        <tr>
                        <td>Quantity:</td>

                        <td>
                        <button type="button" onclick="minus(); sum();">-</button>
                        <input type="number" name="quantity" id="quantity" min="0" max="50" onKeyUp="sum()">
                        <button type="button" onclick="plus(); sum();">+</button>
                        </td>
                        </span>
                        <span class="float-right">
                        <td><b>Total:
                            <i>$</i>
                            <input name="total" style="width:50px;" id="total" readonly>
                        </b></td>
                        </tr>
                        </span>
                        </div>
                        </div>
                        <br>
                        <span class="float-right">
                        <input type="submit" onclick="this.disabled=true;;this.form.submit();" class="btn btn-primary">
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection