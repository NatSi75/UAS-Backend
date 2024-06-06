<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

<style>
    nav {
        text-align: center;
    }

    div a {
        text-decoration: none;
    }
    
    #nav a {
        text-decoration: none;
    }

    a:link,
    a:visited {
        color: black;
    }

    a:hover {
        color: red;
    }
</style>

<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav id="nav" class="mt-3">
    <a href="/">Home</a>
    <a href="/filter?kategori=crime" class="ms-1">Crime</a>
    <a href="/filter?kategori=sport" class="ms-1">Sport</a>
    <a href="/filter?kategori=lifestyle" class="ms-1">Lifestyle</a>
    <a href="/filter?kategori=finance" class="ms-1">Finance</a>
    <a href="{{ url('register') }}" class="ms-1">Register</a>
    <a href="{{ url('login') }}" class="ms-1">Login</a>
    <a href="{{ url('profile') }}" class="ms-1">Profile</a>
</nav>

@yield('content')