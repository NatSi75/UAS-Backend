@extends('header')
@section('title', 'Profile')

@section('content')
@php
    $counter = 0;
@endphp
<div class="container mt-5 border rounded">
    <div class="container card col-lg-3 p-0">
        <div class="card-header text-center">Profile</div>
        <div class="card">
            <div class="card-body">
            <p>Name : {{ $editors->username }}</p>
            <p>Email : {{ $editors->email }}</p>
            <p>Phone Number : {{ $editors->phone_number }}</p>
            <a href="/update-profile" class="btn btn-warning">Update Profile</a>
            <a href="/change-password" class="btn btn-warning">Change Password</a>
        </div>
        </div>
    </div>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            @php
                $counter++;
            @endphp
            <tr>
            <th scope="row">
                @php
                    echo $counter
                @endphp
            </th>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td>{{$article->category}}</td>
            <td>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary" role="button">Edit</a>
                <a href="/delete-article?id={{$article->id}}" class="btn btn-danger" role="button">Delete</a>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection