<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Organization:</strong> {{ $data['organization'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Contact:</strong> {{ $data['contact'] }}</p>
<p><strong>Department:</strong> {{ ucfirst($data['department']) }}</p>
<p><strong>Query:</strong></p>
<p>{{ $data['query'] }}</p>

</body>
</html>


