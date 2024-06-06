@extends('header')
@section('title', 'Register')

@section('content')
    <form method="POST" action="/register" class="ms-1">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
        <input type="submit" value="Register" class="mt-1">
    </form>
@endsection

@include('footer')