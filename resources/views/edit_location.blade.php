@extends('layouts.app')
@section('content')

<script src="{{ asset('js/custom.js') }}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Drawer report<span class="float-right">
                <div class="noprint">
                <a href='/location' class="btn btn-secondary">Back</a>
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
                        <input type="number" class="form-control" name="start_cash" id="start_cash" value="{{$wallets->sum('start_cash')}}">
                       <br>
                        <label for="info">Orders:</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="{{$locations->sum('total')}}">
                        <br>
                        <label for="info">Paid In/Out:</label>
                        <input type="number" class="form-control" name="paid_in" id="paid_in" value="{{$wallets->sum('paid_in')}}">
                        <div>
                        <hr style="width:100%;">
                        <label for="info">Total:</label>
                        <div id="totalvalue">0</div>
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
                        <td>{{ $wallet->paid_in }}</td>
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
                        <a href="/location/{{ $loc->id }}" class="btn btn-primary float-right" >Close drawer</a></td>

                       <!-- <input type="submit" class="btn btn-primary"> -->
</form>
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
    <script type="text/javascript">
 function add_number() {

var first_number = parseInt(document.getElementById("start_cash").value);
var second_number = parseInt(document.getElementById("paid_in").value);
// var third_number = parseInt(document.getElementById("paid_out").value);
var fourth_number = parseInt(document.getElementById("amount").value);


var result = first_number + second_number + fourth_number;

document.getElementById("paid_total").value = result;
}

</script>
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

<script>
   $(function() {
    $('.form-control').change(function() {
        var total = 0;

        $('.form-control').each(function() {
            if( $(this).val() != '' )
                total += parseInt($(this).val());
        });

        $('#totalvalue').html(total);
    })

    // trigger initial calculation
    .change();
}); 
</script>
@endsection