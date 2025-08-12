<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zara Collections</title>
</head>

<body>
    <div class="print">
        <button id="printButton">
            <p class="print-btn">Print Receipt</p>
        </button>
        <a href="{{ url()->previous() }}"> <button>
                <p class="back-btn">Back</p>
            </button></a>
    </div>
    <!-- {{-- print Receipt --}} -->
    <div id="invoice-POS">
        <div id="printed_content">
            <center id="top">
                <div class="logo">
                    <img width="70px" height="60px" src="{{ asset('assets/img/zara-logo.png') }}" alt="">
                    {{-- <h5>Zara Collections</h5> --}}
                </div>
                <div class="info"></div>
            </center>
        </div>
            <br>
        <div class="mid">   
            <div class="info">

                <h2 class="contact">Contact Us</h2>
                <p>
                    <span class="bold">Address</span> : shop No 1 Jama Cloth Market, Opp Mannan Hotel, Unit# 8, Latifabad Hyderabad <br>
                    <span class="bold">Email</span> : info@ZaraCollections.com <br>
                    <span class="bold">Contact No</span> : 0317-3855012 | 0317-3855013 
                </p>
            </div>
        </div>
        <div class="mid">
            <div class="Detail">
                <center>
                    <h2 class="contact">Detail:</h2>
                </center>
                <p>
                    <span class="bold">Order No </span>  : {{$lastTransaction->id }} <br>

                    <span class="bold">Customer Name</span> :
                    @if ($lastTransaction->order_id == 0)
                        walking Customer
                    @else
                        {{ $lastTransaction->order->name }}
                    @endif <br>
                    <span class="bold">Customer Phone:</span> :  @if ($lastTransaction->order_id == 0)
                    walking Customer
                @else
                    {{ $lastTransaction->order->phone_no }}
                @endif <br>
                    <span class="bold">Cashier Name</span> : {{ auth()->user()->name }} <br>
                    <span class="bold">Invoice Date</span> : {{ $currentTime }} <br>
                    <span class="bold">Seller</span> : @if ($lastTransactionemp->seller_id == 0)
                        Admin
                    @else
                        {{ $lastTransactionemp->employee->employee_name }}
                    @endif <br>
                    <span class="bold">Payment Method </span>  : {{$lastTransaction->payment_method }} <br>

                </p>
            </div>
        </div>

        <div class="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="rate">
                            <h2>Unit</h2>
                        </td>
                        <td class="Hours">
                            <h2>QTY</h2>
                        </td>
                        {{-- <td class="rate"><h2>Discount(%)</h2></td> --}}
                        <td class="rate">
                            <h2>Sub Total</h2>
                        </td>

                    </tr>
                    @foreach ($order_receipt as $receipt)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{ $receipt->product->product_name }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ number_format($receipt->unitprice, 2) }}</p>
                            </td>
                            <td class="tableitem">
                                <center>
                                    <p class="itemtext">{{ $receipt->quantity }}</p>
                                </center>
                            </td>
                            {{-- <td class="tableitem"><center><p class="itemtext">{{ $receipt->discount}}%</p></center></td> --}}
                            <td class="tableitem">
                                <p class="itemtext">{{ number_format($receipt->amount, 2) }}</p>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        {{-- <td></td> --}}
                        <td class="Rate">Total</td>
                        <td class="payment">
                            <h2>{{ number_format($transAmount, 2) }}</h2>
                        </td>

                    </tr>
                </table>
                <div class="legalcopy">
                    <p class="legal"><strong>** Thank you for visit **

                        </strong><br>
                        The good which are subject to tax, Prices include The good which are subject to tax, Prices
                        include
                    </p>
                </div>

            </div>
            <div class="design">
                <p style="margin: -5px;">Software Developed By <a href="#">Devextra Solutions</a></p>
                <p>PH : 03457506903 | www.devextrasolutions.com</p>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>


    <style>
        #invoice-POS {
            padding: 2mm;
            margin: 0 auto;
            width: 65mm;
            background: #fff;
        }

        #invoice-POS ::selection {
            background: #012970;
            color: #fff;

        }

        #invoice-POS ::-moz-selection {
            background: #012970;
            color: #fff;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: 0.7em;

        }

        #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            font-size: 0.8em;
            line-height: 1.2em;
            color: black;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            border-bottom: 1px solid #eee;
        }

        #invoice-POS #top {
            min-height: 60px;
        }

        #invoice-POS #mid {
            min-height: 100px;
        }

        #invoice-POS #bot {
            min-height: 100px;
        }

        #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
        }

        #invoice-POS .info {

            display: block;
            margin-left: 0;
            text-align: center;
        }

        #invoice-POS .contact {

            font-size: 12px;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            /* font-size: 0.5em; */
            background: #000000;
            color: white;

        }

        #invoice-POS .payment {
            font-size: 23px;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #eee;
            font-size: 1.1em;

        }

        #invoice-POS .item {
            width: 22mm;
            padding-left: 10px;
        }


        #invoice-POS .itemtext {
            font-size: 0.7em;
        }

        #invoice-POS .legalcopy {

            margin: auto;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 20px;
        }

        .detail p {
            line-height: 20px;
        }

        .bold {
            font-weight: bold;
            color: black;
            line-height: 10px;
        }

        .design {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .design p a {
            text-decoration: none;
            padding-left: 1px;

        }

        .print {
            text-align: center;
        }

        .print button {
            width: 15%;
            border: none;
            background: transparent;
            text-align: center;
        }

        .print-btn {
            border-radius: 6px;
            padding: 12px 30px 12px 30px;
            color: white;
            background-color: black;
            border: none;
            text-align: center;
        }

        .back-btn {
            border-radius: 6px;
            padding: 10px 28px 10px 28px;
            color: black;
            background-color: transparent;
            border: solid 2px;
            text-align: center;
        }

        .back-btn a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            /* font-size: px */

        }

        @media print {
        .print {
            display: none;
        } 
        /* Set margins to 0 to remove extra white space */
        body {
            margin: 0;
        }

        /* Adjust padding and margins for specific elements to control spacing */
        #invoice-POS {
            margin: auto;
            padding: 5mm; /* Adjust as needed */
        }

        /* Adjust other elements as needed */
        .info {
            margin-bottom: 5mm; /* Add spacing between sections */
        }

        /* Hide buttons when printing */
        .button-container {
            display: none;
        }

        /* Specify paper size and orientation (optional) */
        @page {
             /* Adjust the size as needed */
            margin: 0;
        }
    }
    </style>
</body>

</html>
<script>
    document.addEventListener("keydown", function(event) {
        if (event.ctrlKey && event.key === "p") {
            window.print();
        }
    });
</script>
