<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    @include('header')

    <form method="PATCH" action="/change-password">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="new_password">New Password</label><br>
        <input type="password" id="new_password" name="new_password"><br>
        <label for=" confirm_new_password">Confirm New Password</label><br>
        <input type="password" id=" confirm_new_password" name=" confirm_new_password"><br>
        <input type="submit" value="Change Password">
    </form>
    
    @include('footer')
</body>
</html>