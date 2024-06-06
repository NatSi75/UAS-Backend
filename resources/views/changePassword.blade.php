@extends('header')
@section('title', 'Change Password')

@section('content')
    <form method="PATCH" action="/change-password">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="new_password">New Password</label><br>
        <input type="password" id="new_password" name="new_password"><br>
        <label for=" confirm_new_password">Confirm New Password</label><br>
        <input type="password" id=" confirm_new_password" name=" confirm_new_password"><br>
        <input type="submit" value="Change Password">
    </form>
@endsection

@include('footer')