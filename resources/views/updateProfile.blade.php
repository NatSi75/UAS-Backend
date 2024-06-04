<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    @include('header')
    <form method="PUT" action="/update-profile">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
    </form>
    @include('footer')
</body>
</html>