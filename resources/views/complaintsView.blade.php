@extends('header')

@section('title', 'Complaints View')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">All Users' Complaints</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Complaint</th>
                    <th>Posted On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->name }}</td>
                    <td>{{ $complaint->email }}</td>
                    <td>{{ $complaint->phone_number }}</td>
                    <td>{{ $complaint->complaint }}</td>
                    <td>{{ $complaint->created_at }}</td>
                    <td>
                        <form action="{{ route('complaint.clear', $complaint->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Clear</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-4">
            <form action="{{ route('complaint.deleteAll') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete All Complaints</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan tinggi viewport untuk memastikan halaman penuh */
    }
</style>
@endsection
