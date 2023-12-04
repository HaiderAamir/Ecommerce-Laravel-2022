<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dear {{ $details["name"] }}</h3>
    <p>You order confirm against that invoice number</p>
    <b>{{ $details["invoice_number"] }}</b>
    <p>You can check in you order list</p>
    {{--  <h2>{{$details}}</h2>  --}}
    <br>
    <p>For any query, you can mail at:<a href="mailto:info@adorepal.com">Contact Us</a></p>

</body>
</html>
