@extends('header')
@section('title', 'Register')

@section('content')
    <form method="POST" action="/register" class="ms-1">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        @if ($errors->has('username'))
            <div class="error">{{ $errors->first('username') }}</div>
        @endif

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

        <label for="phone_number">Phone Number</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
        @if ($errors->has('phone_number'))
            <div class="error">{{ $errors->first('phone_number') }}</div>
        @endif

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>
        @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif

        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br>
        @if ($errors->has('confirm_password'))
            <div class="error">{{ $errors->first('confirm_password') }}</div>
        @endif

        <input type="submit" value="Register" class="mt-1">
    </form>
@endsection

@include('footer')