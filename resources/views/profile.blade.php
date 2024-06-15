@extends('header')
@section('title', 'Profile')

@section('content')
<div class="container mt-5 border rounded">
    <div class="container card col-lg-3 p-0">
        <div class="card-header text-center">Profile</div>
        <div class="card">
            <div class="card-body">
            <p>Name : {{ $users->username }}</p>
            <p>Email : {{ $users->email }}</p>
            <p>Phone Number : {{ $users->phone_number }}</p>
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
            <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td>{{$article->category}}</td>
            <td>
                <a href="/update-article?id={{$article->id}}" class="btn btn-primary" role="button">Edit</a>
                <a href="/delete-article?id={{$article->id}}" class="btn btn-danger" role="button">Delete</a>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection