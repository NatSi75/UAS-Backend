@extends('header')

@section('content')
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Dashboard</title>


    </head>
    <body class="m-10">
        Welcome {{ $users->username}}
    </body>
</html>
@endsection