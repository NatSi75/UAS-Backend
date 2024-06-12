@extends('header')
@section('title', 'Change Password')

@section('content')
    <div class="container mt-5 border rounded" style="width:370px">
        <h2 class="text-center">Change Password</h2>
        <form method="PATCH" action="/change-password">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <label class="form-label" for="password">Password</label><br>
            <input class="form-control form-control-sm" type="password" id="password" name="password"><br>

            <label class="form-label" for="new_password">New Password</label><br>
            <input class="form-control form-control-sm" type="password" id="new_password" name="new_password"><br>

            <label class="form-label" for=" confirm_new_password">Confirm New Password</label><br>
            <input class="form-control form-control-sm" type="password" id=" confirm_new_password" name=" confirm_new_password"><br>
            <input type="submit" value="Change Password" class="btn btn-primary mb-2" style="width:345px">
        </form>
    </div>
@endsection