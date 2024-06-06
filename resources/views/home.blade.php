@extends('header')
@section('title', 'Home')

@section('content')
<div class="row mt-5">
    <div class="col-6 border ms-5">
        <h6>Berita Utama</h6>
        @foreach ($articles as $article)
            <a href="/detail-article?id={{$article->id}}">{{$article->title}}</a><br>
        @endforeach
    </div>

    <div class="col-4 border ms-5">
        <h6>Berita Terpopuler</h6>
    </div>
</div>
@endsection

@include('footer')