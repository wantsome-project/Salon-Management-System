<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1 style="text-align: center">Invoice</h1>
        <table border="1px">
            <tr>
                <th>Customer name</th>
                <th>Service type</th>
                <th>Total to be paid</th>
            </tr>
            <tr>
                <td>{{$customer}}</td>
                <td>{{$service_type }}</td>
                <td>{{$amount." euro" }}</td>
            </tr>
        </table>
<h4>Employee name: {{$employee}}</h4>
<h3>Invoice date: {{\Carbon\Carbon::now()}}</h3>
</body>
</html>


