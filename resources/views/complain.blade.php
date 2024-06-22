@extends('header')
@section('title', 'Complaint Form')

@section('content')
    <div class="container mt-5" style="width:1500px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h1 class="text-center">Complaint Form</h1>
                    <style>
                        .error {
                            color: red;
                            font-size: 0.9em;
                        }
                    </style>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('complaint.submit') }}">
                        @csrf

                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif

                        <div class="form-group mt-2">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" type="text" class="form-control" name="phone_number" required>
                        </div>
                        @if ($errors->has('phone_number'))
                            <div class="error">{{ $errors->first('phone_number') }}</div>
                        @endif

                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif

                        <div class="form-group mt-2">
                            <label for="complaint">Complaint</label>
                            <textarea id="complaint" class="form-control" name="complaint" rows="5" required></textarea>
                        </div>
                        @if ($errors->has('complaint'))
                            <div class="error">{{ $errors->first('complaint') }}</div>
                        @endif
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
