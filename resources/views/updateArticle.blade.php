@extends('header')
@section('title', 'Update Article')

@section('content')
    <form method="PUT" action="/update-article">
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul"><br>
        <label for="isi">Isi</label><br>
        <textarea name="isi" rows="15" cols="100"></textarea><br>
        <label for="gambar">Gambar : </label>
        <input type="file" id="gambar" name="gambar"><br>
        <input type="submit" value="Update">
    </form>
@endsection

@include('footer')