@extends('header')
@section('title', 'Create Article')

@section('content')
    <form method="POST" action="/create-article" class="ms-1">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <label for="title">Judul</label><br>
        <input type="text" id="title" name="title"><br>
        @if ($errors->has('title'))
            <div class="error">{{ $errors->first('title') }}</div>
        @endif                                                                                                              

        <textarea name="body" rows="15" cols="100"></textarea><br>
        @if ($errors->has('body'))
            <div class="error">{{ $errors->first('body') }}</div>
        @endif

        <select class="" id="category" name="category">
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
        
        <label for="image">Gambar: </label>
        <input type="file" id="image" name="image"><br>
        @if ($errors->has('image'))
            <div class="error">{{ $errors->first('image') }}</div>
        @endif

        <input type="submit" value="Create" class="mt-1">
    </form>
@endsection

@include('footer')
