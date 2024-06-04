<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    @include('header')
    <form action="/delete-article">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn btn-danger" type="Submit">Delete</button>
    </form>
    @include('footer')
</body>
</html>