@extends('header')
@section('title', 'Filter')

@section('content')
    <div class="row border m-5">
        @foreach ($articles as $article)
            <a href="/detail-article?id={{$article->id}}">{{$article->title}}</a>
        @endforeach
    </div>
@endsection

@include('footer')