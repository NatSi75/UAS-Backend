@extends('header')
@section('title', 'Detail Article')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-lg-8">
            <!-- Post content-->
            <article class="border p-2">
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->  
                    <h4 class="fw-bolder mb-1">{{ $article->title }}</h4>
                   
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-1">Posted on {{ \Carbon\Carbon::parse($article->updated_at)->format('D, d M Y') }} by {{ $article->editor }}</div>
                     <!-- Post views and likes counter-->
                     <div class="text-muted mb-2">Views: {{ $article->views }}</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light">{{ $article->kategori }}</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{ URL::to('/') }}/storage/images/{{$article->image}}" alt="..." style = "height: 200px; width: 350px;"/></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <span class="fs-5 mb-4">{{ $article->body }}</span>
                </section>
            </article>
            
            <h6 class="mt-3">Add a new comment</h6>
            <form method="POST" action="/comment">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" id="article_id" name="article_id"  value="{{ $article->id }}">
                <textarea class="form-control" id="comment" name="comment" placholder="Type your comment" required></textarea>
                <input type="submit" class="btn btn-primary mt-2" value="Post Comment">
            </form>

            <div class="antialised mx-auto max-w-screen-sm mb-5">
                <h3>Comments</h3>
                <div class="space-y-4">
                    @foreach ($comments as $comment)
                    <div class="flex">
                        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong>{{ $comment->username }}</strong> <span class="text-xs text-gray-400">{{ $comment->created_at }}</span>
                            <p class="text-sm">
                                {{ $comment->comment }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

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