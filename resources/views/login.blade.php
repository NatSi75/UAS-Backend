@extends('header')
@section('title', 'Login')

@section('content')
<html>
    <body class="m-10">
        @if ($errors->any())
            <div class="bg-red-200 p-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/login" class="ms-1">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="mb-5">
                <label for="email" class="block">Email:</label>
                <input type="text" id="email" name="email" class="border border-gray-300 p-1">
            </div>

            <div class="mb-5">
                <label for="password" class="block">Password:</label>
                <input type="password" id="password" name="password" class="border border-gray-300 p-1">
            </div>

            <div class="mb-5">
                <label for="remember" class="block">
                    <input type="checkbox" name="remember" id="remember"> Remember me
                </label>
            </div>

            <button type="submit" class="rounded btn btn-success">Log in</button>
        </form>
    </body>
</html>
@endsection

@include('footer')