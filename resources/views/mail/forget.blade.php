<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h3>Dear {{ $details["name"] }}</h3>
    <p>We have recieved you reset password request. If it was you click on this link to reset your password.</p>
    <p><a href="http://127.0.0.1:8000/reset_password/{{$details['code']}}">Click here</a></p>
    <p>Otherwise ignore this email</p>
    <br>
    <p>For any query, you can mail at:<a href="mailto:info@adorepal.com">Contact Us</a></p>

</body>
</html>
