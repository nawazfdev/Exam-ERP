<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Booking Confirmation</h2>

    <p>Thank you for booking with Beauty Healthy 24.</p>
    <p>Details of your booking:</p>
    <p>Name: {{ $booking['name'] }}</p>
    <p>Email: {{ $booking['email'] }}</p>
    <p>Phone: {{ $booking['phone'] }}</p>
    <!-- Add additional booking details as needed -->

    <p>We look forward to serving you!</p>
</body>
</html>
