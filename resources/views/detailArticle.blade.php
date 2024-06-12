@extends('header')
@section('title', 'Detail Article')

@section('content')
<div class="container mt-5 border">
    <div class="row">

        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->  
                    <h4 class="fw-bolder mb-1">{{ $article->title }}</h4>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{ $article->published_at }} by {{ $article->editor }}</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light">{{ $article->kategori }}</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/200x100/ced4da/6c757d.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <span class="fs-5 mb-4">{{ $article->body }}</span>
                </section>
            </article>
            <!-- Side widgets-->
        </div>

        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Berita Terkait</div>
                @foreach ($articles as $article)
                <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted">{{$article->published_at}}</div>
                    <a href="/detail-article?id={{$article->id}}"><h6 class="card-title text-wrap">{{$article->title}}</h6></a>
                    <span class="card-text d-inline-block text-truncate" style="max-width: 330px;"">{{$article->body}}</span><br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection    