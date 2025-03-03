<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Salary File</title>
</head>
<body>
    <h2>Upload Salary Excel File</h2>
    @if(session('errors'))
    <h3>Error Report</h3>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Row</th>
                <th>Error Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('errors') as $error)
                <tr>
                    <td>{{ $error['row'] }}</td>
                    <td>{{ $error['error'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('salary.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
