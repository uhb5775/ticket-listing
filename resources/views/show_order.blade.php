<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://scontent.fsof3-1.fna.fbcdn.net/v/t1.0-9/p960x960/37708543_425022211238862_7936713685966258176_o.png?_nc_cat=104&_nc_oc=AQlfcmxcQcX5-QR-Jja3qfNoGlNqEFSs_J-Q52uyAoneAMnZ7dylhlB446qbExq_-M4&_nc_ht=scontent.fsof3-1.fna&oh=684b2dbf66dbef31bba9f1ab1c622c43&oe=5E8E2A38" style="width:100%; max-width:160px;">
                            </td>
                            
                            <td>
                           Invoice № {{ $order->id }}<br>
                                Date created: {{ $order->created_at }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Address:<br>
                                720 7th Ave,<br>
                                New York, NY 10036
                            </td>
                            
                            <td>
                                BroadwayPass.<br>
                                Agent: {{ $order->ename }}<br>
                                info@broadwaypass.com<br>
                                (212) 757 - 1720
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Event name:
                </td>
                
                <td>
                    Purchase:
                </td>
            </tr>
            
            <tr class="item">
                <td>
                {{ $order->event }}
                </td>
                
                <td>
                ${{ $order->price }}
                </td>
            </tr>
            
             <tr class="heading">
                <td>
                    Quantity:
                </td>
                
                <td>
                    {{ $order->quantity }}
                </td>
            </tr>
            <tr class="total">
                <td></td>  
                <td>
                   Total: ${{ $order->total }}
                </td>
            </tr>
        </table>
        <p><small>Your Seats are Secured Now!
TICKET PICK UP
ALL TICKETS ARE AVAILABLE FOR PICK UP 1 HOUR
BEFORE THE SHOW!<br>
Please pick up your tickets at least 15 minutes prior show time!
PICK UP LOCATION
720 7th Ave, on the corner of 48th and 7th Ave
                                          /Inside Money Exchange/
(212) 757 - 1720
▇ ▇ ▇ ▇ ▇ ▇ ▇ ▇ ▇ ▇ ▇</small></p>
<br><br><br><br>
<button class="back"style="margin-left:621px;"><a href="/orders">Back</a></button>
<button onclick="myFunction()">Print</button>
    </div>
    <script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>           