<!DOCTYPE html>
<html>
<head>
    <title>New Consultation Form Submission</title>
</head>
<body>
    <h2>New Consultation Form Submission</h2>
    <p><strong>Project Name:</strong> {{ $data['projectname'] }}</p>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
