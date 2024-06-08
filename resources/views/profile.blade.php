@extends('header')
@section('title', 'Kategori')

@section('content')
    <div class="ms-1">
        <p>Name : {{ $users->username }}</p>
        <p>Email : {{ $users->email }}</p>
        <p>Phone Number : {{ $users->phone_number }}</p>
    </div>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td>{{$article->kategori}}</td>
            <td>
                <a href="/update-article?id={{$article->id}}" class="btn btn-success" role="button">Edit</a>
                <a href="/delete-article?id={{$article->id}}" class="btn btn-danger" role="button">Delete</a>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection

@include('footer')