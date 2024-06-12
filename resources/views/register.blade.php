@extends('header')
@section('title', 'Register')

@section('content')
<div class="container mt-5 border rounded" style="width:350px">
    <h2 class="text-center">Register</h2>
    <form method="POST" action="/register" class="ms-1">
        <style>
            .error {
                color: red;
                font-size: 0.9em;
            }
        </style>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label class="form-label" for="username">Username</label><br>
        <input class="form-control form-control-sm" type="text" id="username" name="username"><br>
        @if ($errors->has('username'))
            <div class="error">{{ $errors->first('username') }}</div>
        @endif

        <label class="form-label" for="email">Email</label><br>
        <input class="form-control form-control-sm" type="email" id="email" name="email"><br>
        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

        <label class="form-label" for="phone_number">Phone Number</label><br>
        <input class="form-control form-control-sm" type="text" id="phone_number" name="phone_number"><br>
        @if ($errors->has('phone_number'))
            <div class="error">{{ $errors->first('phone_number') }}</div>
        @endif

        <label class="form-label" for="password">Password</label><br>
        <input class="form-control form-control-sm" type="password" id="password" name="password"><br>
        @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif

        <label class="form-label" for="confirm_password">Confirm Password</label><br>
        <input class="form-control form-control-sm" type="password" id="confirm_password" name="confirm_password"><br>
        @if ($errors->has('confirm_password'))
            <div class="error">{{ $errors->first('confirm_password') }}</div>
        @endif

        <input type="submit" value="Register" class="btn btn-primary mb-2" style="width:320px">
    </form>
</div>
@endsection