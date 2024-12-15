<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Users</title>
</head>
<body>
    <h1>Upload Users Excel File</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx,.csv,.xls" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
