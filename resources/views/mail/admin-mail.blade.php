<!DOCTYPE html>
<html>
<head>
 <title>Contact Request</title>
</head>
<body>

 <h3>Contact Request</h3>
 <table style="border: 2px solid yellow;">
    <tr>
        <th style="border: 2px solid yellow;">Name</th>
        <td style="border: 2px solid yellow;">{{$details["name"]}}</td>
    </tr>
    <tr>
        <th style="border: 2px solid yellow;">Email</th>
        <td style="border: 2px solid yellow;">{{$details["email"]}}</td>
    </tr>
    <tr>
        <th style="border: 2px solid yellow;">Phone</th>
        <td style="border: 2px solid yellow;">{{$details["phone"]}}</td>
    </tr>
    <tr>
        <th style="border: 2px solid yellow;">Subject</th>
        <td style="border: 2px solid yellow;">{{$details["subject"]}}</td>
    </tr>
    <tr>
        <th style="border: 2px solid yellow;">Message</th>
        <td style="border: 2px solid yellow;">{{$details["message"]}}</td>
    </tr>
 </table>


</body>
</html>
