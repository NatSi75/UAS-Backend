<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    @include('header')
    <h1>Register</h1>

    <form method="POST" action="/register">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br>
        <input type="submit" value="Register">
    </form>
    @include('footer')
</body>
</html>