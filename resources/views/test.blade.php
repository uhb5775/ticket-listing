@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Show event<span class="float-right"><a href='/order' class="btn btn-secondary">Go Back</a></div>
  <div class="card-body">
  @if(session('status'))
  <div class="alert alert-success" role="alert">
  {{session('status')}}
  </div>
  @endif
            
<form method="post" action="/listings">
@csrf
        <select class="form-control m-bot15" name="eventid">
                        @if(count($listings))
                        @foreach ($listings as $listing) 
                       <option>{{ $listing->event }}</option>
                        </div>
                        @endforeach
                        </div>
                        @else
                        <p>No events found!</p>
                        @endif
                        </select>
                
<br>
<div class="form-group">
<div class="list-group-item">
                    <label for="info">Info:</label>
                    <input type="text" class="form-control" name="info" id="info" placeholder="Notes">
                    <br>
                    <label for="price">Price $:</label>
                    <input type="currency" class="form-control" name="Price" id="Price" placeholder="$">
                  
                    </div>
                    <div class="list-group-item">
           Order Date:       {{date("Y-m-d\TH:i")}}

                    </div>
                    <!-- <div class="list-group-item">
       Quantity:            {{ $listing->quantity }}
                    </div> -->
                    <br>
                    <div>
                    <span class="float-left">
                    <tr>
                    
  <td>Quantity:</td>
  
  <td>
    <input type="number" value="" name="Quantity" id="Quantity" onKeyUp="sum()" />
  </td>
</span>
<span class="float-right">

  <td>Total:
    <i>$</i>
    <input type="text" name="Total" id="Total" readonly/>
  </td>
</tr>
</span>
                    </div>
                    
                    <!-- <div class="list-group-item">
              Total:       {{ $listing->total }}
                    </div> -->
                    <script>
                    function sum() {
  a = Number(document.getElementById('Quantity').value);
  b = Number(document.getElementById('Price').value);
  c = a * b;
  document.getElementById('Total').value = c;
}</script>
                </div>
                <br>
                <span class="float-right">
        <button type="submit" class="btn btn-primary">Submit</button>
        </span>
</form>
</div>
                    </div>
                   </div>
                  </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

