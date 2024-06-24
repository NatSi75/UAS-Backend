@extends('header')
@section('title', 'Home')

@section('content')
@if (session('storeComplaint'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="max-width: 400px; margin: auto;">
        <p class="m-0">{{ session('storeComplaint') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="max-width: 400px; margin: auto;">
                <p class="m-0">{{ session('error') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
@endif
<div class="container mb-5">
    <div class="row mt-5">
        <div class="card col-lg-5 p-0 ms-5">
            <div class="card-header">Berita Utama</div>
            @foreach ($articles as $article)
            <div class="card mb-4">
                <a href="/detail-article?id={{$article->id}}"><img class="img-thumbnail" src="{{ URL::to('/') }}/storage/images/{{$article->image}}" alt="..." style = "height: 200px; width: 350px;" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$article->published_at}}</div>
                    <a href="/detail-article?id={{$article->id}}"><h6 class="card-title text-wrap">{{$article->title}}</h6></a>
                    <span class="card-text d-inline-block text-truncate" style="max-width: 420px;">{{$article->body}}</span><br>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card col-lg-5 p-0 ms-5">
            <div class="card-header">Berita Terpopuler</div>
            @foreach ($popularArticles as $article)
            <div class="card mb-4">
                <a href="/detail-article?id={{$article->id}}"><img class="img-thumbnail" src="{{ URL::to('/') }}/storage/images/{{$article->image}}" alt="..." style = "height: 200px; width: 350px;"/></a>
                <div class="card-body">
                    <div class="small text-muted">{{$article->published_at}}</div>
                    <a href="/detail-article?id={{$article->id}}"><h6 class="card-title text-wrap">{{$article->title}}</h6></a>
                    <span class="card-text d-inline-block text-truncate" style="max-width: 420px;">{{$article->body}}</span><br>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection