@extends('header')
@section('title', 'Filter')

@section('content')
    <div class="row m-5">
        @foreach ($articles as $article)
            <div class="card mb-4">
                <a href="/detail-article?id={{$article->id}}"><img class="img-thumbnail" src="{{ URL::to('/') }}/storage/images/{{$article->image}}" alt="..." style = "height: 200px; width: 350px;" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$article->published_at}}</div>
                    <a href="/detail-article?id={{$article->id}}"><h6 class="card-title text-wrap">{{$article->title}}</h6></a>
                    <span class="card-text d-inline-block text-truncate" style="max-width: 1100px;"">{{$article->body}}</span><br>
                </div>
            </div>
            @endforeach
    </div>
@endsection