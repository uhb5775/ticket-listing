@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Drawer report<span class="float-right">
                <div class="noprint">
                <!-- <a href='/location' class="btn btn-secondary">Back</a> -->
                </div>
                </div>                                  
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                        <div class="card-body">
                        
                        <div class="form-group">
                        <div class="list-group-item">
                        <label for="location">Location: {{$loc->location_id}}</label>
                        </div>     
                        <form method="post" action="/post_drawer">
                        @csrf           
                        <br>
                        <input type="hidden" name="location_id" id="location_id" value="{{$loc->location_id}}">

                        <label for="info">Starting cash</label>
                        @foreach($sales as $sales)
                        @if($loop->last)
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$sales->start_cash}}" readonly>
                        @endif
                        @endforeach
                        <label for="info">Orders:</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="{{$sales->amount}}" readonly>
                        <label for="info">Paid In:</label>
                        <input type="number" class="form-control" name="paid_in" id="paid_in" value="{{$sales->paid_in}}" readonly>
                        <label for="info">Paid Out:</label>
                        <input type="number" class="form-control" name="paid_out" id="paid_out" value="{{$sales->paid_out}}" readonly>
                        <div>
                        <hr style="width:100%;">
                        <label for="info">Total:</label>
                        <input type="number" class="form-control" name="paid_total" id="paid_total" value="{{$sales->paid_total}}" readonly>
                        <br>
                        <table class="table table-striped table-hover" border="1">
                        <thead>
                        <tr>
                        <th>Paid In/Out</th>
                        <th>Info</th>
                        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($wallets))

                        @foreach ($wallets as $wallet)
                        <tr> 
                        <td>{{ $wallet->pay_in }}</td>
                        <td>{{$wallet->info}}</td>
                        <td>{{$wallet->created_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <p>No payments found!</p>
                        @endif
                        </tbody>
                        </table>
                        <span class="float-left">                
                        </span>
                        </div>
                        </div>
                        <br>
                        <span class="float-right">
                        <div class="noprint">
                        <button type="button" class="btn btn-success" onclick="myFunction()">Print</button>
                        <!-- <a type="button" href="/index_wallet" class="btn btn-primary">Drawers history</a> -->
                        <a href="{{action('LocationsController@update', $loc->id)}}">Button</a>

                        <!-- <input type="submit" class="btn btn-primary"> -->
                        </div>
    <script>
var panel = document.getElementById("content");
            var el = document.querySelector( '.noprint' );
            panel.removeChild(el);
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(panel.innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            setTimeout(function () {
                printWindow.print();
            }, 500);
            return false;
        }
</script>
                        </span>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
<style>
.noprint
        {
            color:red;
        }
        @media print {
            p
            {
                color:green;
            }
            .noprint {
                display: none;
                
            }
        }
        </style>
@endsection

