<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <p>First Name: {{ $contactMessage->first_name }}</p>
    <p>Last Name: {{ $contactMessage->last_name }}</p>
    <p>Email: {{ $contactMessage->email }}</p>
    <p>Message:</p>
    <p>{{ $contactMessage->message }}</p>
</body>
</html>
