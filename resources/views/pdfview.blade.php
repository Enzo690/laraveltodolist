<head>
    <title>User list - PDF</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container">
    <a href="{{ route('generate-pdf', ['download'=>'pdf']) }}">Download PDF</a>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>Name</td><td>Email</td>
        </tr>
        @foreach ($users as $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
