@extends('header')
@section('title', 'Create Article')

@section('content')
<div class="container mb-5 mt-5 border rounded" style="width:1000px">
    <h2  class="text-center">Create Article</h2>
    <form method="POST" action="/create-article" enctype='multipart/form-data'>
        <style>
            .error {
                color: red;
                font-size: 0.9em;
            }
        </style>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label class="form-label" for="title">Title</label><br>
        <input class="form-control" type="text" id="title" name="title"><br>
        @if ($errors->has('title'))
            <div class="error">{{ $errors->first('title') }}</div>
        @endif

        <label class="form-label" for="body">Body</label><br>
        <textarea class="form-control" name="body" rows="10" cols="100"></textarea><br>
        @if ($errors->has('body'))
            <div class="error">{{ $errors->first('body') }}</div>
        @endif

        <select class="form-control" id="category" name="category">
                <option selected disabled>Select category</option>
                <option value="lifestyle">Lifestyle</option>
                <option value="crime">Crime</option>
                <option value="finance">Finance</option>
                <option value="sport">Sport</option>
                <option value="miscellaneous">Miscellaneous</option>
        </select>
        @if ($errors->has('category'))
            <div class="error">{{ $errors->first('category') }}</div>
        @endif

        <label class="form-label mt-2" for="image">Gambar</label>
        <input class="form-control" type="file" id="image" name="image"><br>
        @if ($errors->has('image'))
            <div class="error">{{ $errors->first('image') }}</div>
        @endif

        <input type="submit" value="Create" class="btn btn-primary mb-2" style="width:980px">
    </form>
</div>

@endsection