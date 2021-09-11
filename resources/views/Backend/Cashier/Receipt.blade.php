<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="{{asset('css/backend/receipt.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('css/backend/no-print.css')}}" media="print">
    <style>
        p{
            display: inline-block;
        }
        .right_side{
            float: right;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div class="receipt_header">
            <h4 id="tax_invoice">TAX INVOICE</h4>
            <h4 id="shop_name">Noor Kitchen Hygenic Suppliers</h4>
            <h5 id="shop_address">Address: Malekhu, Dhading</h5>
            <h6 id="shop_pan">Vat No: 607095982</h6>
            <h6 id="contact_number">Contact No: +977-9851274786</h6>
            <p>Invoice Number: <strong>{{$sales->id}}</strong></p>
            <p class="right_side">Date: {{date('Y-m-d')}}</p>
            <br>
            <p>Customer: {{$sales->customer_name}}</p>
            <p class="right_side">User ID: {{$user->staff_id}}</p> 
            <br>           
            <p>Sold By: {{$sales->user_name}}</p>
            <p class="right_side">Vehicle Number: {{$sales->vehicle_number}}</p>
            <br>
            <p>Payment Mode: {{$sales->payment_type}}</p>
        </div>
        <div class="receipt_body">
            <table class="tb-sale-details">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleDetails as $key=>$saleDetail)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$saleDetail->product_name}}</td>
                        <td>{{$saleDetail->quantity}}</td>
                        <td>{{$saleDetail->product_price}}</td>
                        <td>{{$saleDetail->product_price * $saleDetail->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                    <tr>
                        <td>Total Amount: Rs. {{number_format($sales->total_price,2)}}</td>
                    </tr>
                    <tr>
                        <td>Amount Received: Rs. {{number_format($sales->total_received,2)}}</td>
                    </tr>
                    <tr>
                        <td>Change Amount: Rs. {{number_format($sales->change,2)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="receipt_footer">
            <p>Thankyou !!!</p>
        </div>
        <div id="buttons">
            <a href="/cashier">
                <button class="btn btn-back">Back to Cashier</button>
            </a>
            <button class="btn btn-print" type="button" onclick="window.print() 
            return false;"> Print
            </button>
        </div>
    </div>

</body>

</html>