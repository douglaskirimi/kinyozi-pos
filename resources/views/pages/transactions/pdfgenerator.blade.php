<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    } 
    .mpesa-color{
        color:limegreen;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">{{ $title }}</h1>
    <h3 class="text-center m-0 p-0 mpesa-color">RECEIPT {{ $receipt_number }}</h3>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Receipt No - <span class="gray-color"> {{ $receipt_number }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Customer Name - <span class="gray-color"> {{ $customer_name }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Service Offered - <span class="gray-color"> {{ $service_offered }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Service Fees - <span class="gray-color"> Ksh.{{ $amount }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Payment Number - <span class="gray-color">{{ $payment_number }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Transaction Date - <span class="gray-color">{{ $transaction_date }}</span></p>
    </div>
    <!-- <div class="w-50 float-left logo mt-10">
     <span>Golden Glitters BarberShop</span>     
    </div> -->
    <div style="clear: both;"></div>
</div>
<!-- <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Gujarat</p>
                    <p>360004</p>
                    <p>Near Haveli Road,</p>
                    <p>Lal Darvaja,</p>
                    <p>India</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>Rajkot</p>
                    <p>360012</p>
                    <p>Hanumanji Temple,</p>
                    <p>Lati Ploat</p>
                    <p>Gujarat</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
        </tr>
    </table>
</div> -->
<!-- <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Lipa na Mpesa</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div> -->  
<div>
<p class="m-0 pt-5 text-bold w-100">Payment Method - <span class="mpesa-color">Lipa na Mpesa</span></p>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Customer Name</th>
            <th class="w-50">Service Offered</th>
            <th class="w-50">Payment Number</th>
            <th class="w-50">Service Fees</th>
            <th class="w-50">Served By</th>
        </tr>
        <tr align="center">
            <td>{{ $customer_name }}</td>
            <td>{{ $service_offered }}</td>
            <td>{{ $payment_number }}</td>
            <td>{{ $amount }}</td>
            <td>{{ $served_by }}</td>
        </tr>
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Fee Total</p>
                        <p>Discount (5%)</p>
                        <p>Total Fee Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>Ksh {{ $amount }}</p>
                        <p>{{ (5/100 * $amount) }}</p>
                        <p>{{ ($amount - (5/100 * $amount)) }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>