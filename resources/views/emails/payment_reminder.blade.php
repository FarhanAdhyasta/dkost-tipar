<!DOCTYPE html>
<html>

<head>
    <title>Payment Reminder</title>
</head>

<body>
    <h1>Payment Reminder</h1>
    <p>Dear {{ $user->name }},</p>
    <p>This is a reminder that your payment for the room {{ $room->nameroom }} is due in 3 days. Please make the payment
        to avoid any inconvenience.</p>
    <p>Thank you,</p>
    <p>{{ config('app.name') }}</p>
</body>

</html>
