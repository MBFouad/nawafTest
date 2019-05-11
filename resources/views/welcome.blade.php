<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 1px;
        }
    </style>
</head>
<body>
<div class="row">
    <h1 class="text-center">Order Items</h1>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
            @foreach($cart->getOrder()->getCartContent() as $cartItem)
                <tr>
                    <th>{{$cartItem->getProductId()}}</th>
                    <th>{{$cartItem->getProductName()}}</th>
                    <th>{{$cartItem->getProductPrice().' SAR'}}</th>
                    <th>{{$cartItem->getCategoryId()}}</th>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="row">
    <h1 class="text-center">Coupon Details</h1>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
        <table class="table">
            <tr>
                <th>Amount</th>
                <td>{{$cart->getCoupon()->getAmount().(($cart->getCoupon()->getType()=='percentage')?'%':' SAR')}}</td>
            </tr>
            <tr>
                <th>Expire Date</th>
                <td>{{date("m/d/Y",$cart->getCoupon()->getEndDate())}}</td>
            </tr>
            <tr>
                <th>Minimum Amount</th>
                <td>{{$cart->getCoupon()->getMinimumAmount().' SAR'}}</td>
            </tr>
            <tr>
                <th>Shipping</th>
                <td>{{($cart->getCoupon()->getFreeShipping())?'include':'not include'}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <h1 class="text-center">Bill Details</h1>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
        <table class="table">
            <tr>
                <th>Summation</th>
                <td>{{$cart->getTotal().' SAR'}}</td>
            </tr>
            <tr>
                <th>Discount</th>
                <td>{{$cart->getDiscount().' SAR'}}</td>
            </tr>
            <tr>
                <th>Shipping</th>
                <td>{{$cart->getShipping().' SAR'}}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>{{$cart->getTotal()+$cart->getShipping()-$cart->getDiscount().' SAR'}}</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
