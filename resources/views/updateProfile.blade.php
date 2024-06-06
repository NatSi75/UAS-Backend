@extends('header')
@section('title', 'Update Profile')

@section('content')
    <form method="PUT" action="/update-profile">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="phone_number">Phone Number</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
    </form>
@endsection

@include('footer')