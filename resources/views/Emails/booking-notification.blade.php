<!DOCTYPE html>
<html>
<head>
    <title>New Booking Notification</title>
</head>
<body>
    <h2>New Booking Notification</h2>

    <p>A new booking has been made on Beauty Healthy 24.</p>
    <p>Details of the booking:</p>
    <p>Name: {{ $booking['name'] }}</p>
    <p>Email: {{ $booking['email'] }}</p>
    <p>Phone: {{ $booking['phone'] }}</p>
    <!-- Add additional booking details as needed -->

    <p>Check your admin panel for further details.</p>
</body>
</html>
