<!DOCTYPE html>
<html>
<head>
    <title>Event Reminder</title>
</head>
<body>
    <h1>Hello {{ $customer_name }},</h1>
    <p>We wanted to remind you about the upcoming event:</p>
    <h3>{{ $event_name }}</h3>
    <p>Date & Time: {{ $event_date_time }}</p>
    <p>Venue: {{ $venue }}</p>

    <p>We hope to see you there!</p>

    <p>Best regards,<br>Your Event Team</p>
</body>
</html>
