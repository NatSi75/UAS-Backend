@extends('header')
@section('title', 'Search')

@section('content')
    @if($articles->isEmpty())
        <p>NO ARTICLES FOUND!!!</p>
    @else
        <ol>
            @foreach($articles as $article)
                <li><a href="/detail-article?id={{ $article->id }}">{{ $article->title }}</a></li>
            @endforeach
        </ol>
    @endif
@endsection

@include('footer')