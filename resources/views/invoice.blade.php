<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Invoice</h2>
    <table>
        <tr>
            <th>Invoice Number</th>
            {{--  <td>{{ $orders->invoice_number }}</td>  --}}
        </tr>
        <tr>
            <th>Date</th>
            {{--  <td>{{ $orders->date }}</td>  --}}
        </tr>
        <tr>
            <th>Address</th>
            {{--  <td>{{ $orders->address }}</td>  --}}
        </tr>
        <tr>
            <th>Total Price</th>
            {{--  <td>{{ $orders->total_price }}</td>  --}}
        </tr>
    </table>
</body>
</html>
