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
    <p>You order is completed. Thank you for shopping.</p>
    <b>AB{{ $details["invoice_number"] }}</b>
    <p>You can check in you order list</p>
    <br>
    <p>For any query, you can mail at:<a href="mailto:info@adorepal.com">Contact Us</a></p>

</body>
</html>
