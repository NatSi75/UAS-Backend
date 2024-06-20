@extends('header')
@section('title', 'Login')

@section('content')
@if (session('register'))
    <div class="alert alert-success text-center p-0">
        <p class="mt-2">{{session('register')}}</p>
    </div>
@elseif (session('error'))
<div class="alert alert-danger text-center p-0">
    <p class="mt-2">{{session('error')}}</p>
</div>
@endif
<div class="container mt-5 border rounded" style="width:350px">
    <h2 class="text-center">Login</h2>
 
    <form method="POST" action="/login" class="ms-1">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label class="form-label" for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control form-control-sm border border-gray-300 p-1">

        <label class="form-label" for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control form-control-sm border border-gray-300 p-1">

        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" class="form-check-label mt-1">Remember Me</label>
        </div>

        <button type="submit" class="rounded btn btn-primary mb-2" style="width:320px">Log in</button>
    </form>
</div>
@endsection