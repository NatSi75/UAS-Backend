@extends('header')
@section('title', 'Update Profile')

@section('content')
    <div class="container mt-5 border rounded" style="width:350px">
        <h2 class="text-center">Update Profile</h2>
        <form action="{{ route('update-profile') }}" method="POST">
            @csrf
            @method('PUT')
            <label class="form-label" for="username">Username</label><br>
            <input class="form-control form-control-sm" type="text" id="username" name="username"><br>

            <label class="form-label" for="email">Email</label><br>
            <input class="form-control form-control-sm" type="email" id="email" name="email"><br>

            <label class="form-label" for="phone_number">Phone Number</label><br>
            <input class="form-control form-control-sm" type="text" id="phone_number" name="phone_number"><br>   
            <input type="submit" value="Update" class="btn btn-primary mb-2" style="width:325px">
        </form>
    </div>
@endsection