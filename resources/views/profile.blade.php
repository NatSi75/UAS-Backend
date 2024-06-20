@extends('header')
@section('title', 'Profile')

@section('content')
@if (session('successCreate'))
    <div class="alert alert-success text-center p-0">
        <p class="mt-2">{{session('successCreate')}}</p>
    </div>
@elseif (session('deleteCreate'))
    <div class="alert alert-success text-center p-0">
        <p class="mt-2">{{session('deleteCreate')}}</p>
    </div>
@elseif (session('updateCreate'))
    <div class="alert alert-success text-center p-0">
        <p class="mt-2">{{session('updateCreate')}}</p>
    </div>
@elseif (session('updateProfile'))
<div class="alert alert-success text-center p-0">
    <p class="mt-2">{{session('updateProfile')}}</p>
</div>
@endif
<div class="container mt-5 mb-5 border rounded">
    <div class="container card col-lg-4 p-0">
        <div class="card-header text-center">Profile</div>
        <div class="card text-center">
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
    <thead class="text-center">
        <tr>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($articles as $article)
            <tr>
                <td>
                    <h6 style="max-width: 100px;">
                        {{$article->title}}
                    </h6>
                </td>
                <td>
                    <p style="max-width: 700px;">
                        {{$article->body}}
                    </p>
                </td>
                <td>{{$article->category}}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary" role="button">Edit</a>
                    <a href="/delete-article?id={{$article->id}}" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    {{ $articles->links() }}
</div>
@endsection