@extends('header')
@section('title', 'Login')

@section('content')
    <form method="POST" action="/login" class="ms-1">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login" class="mt-1">
    </form>
@endsection

@include('footer')