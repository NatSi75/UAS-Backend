<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>
<body>
    @include('header')

    <form method="POST" action="/create-article">
        <label for="judul">Judul</label><br>
        <input type="text" id="judul" name="judul"><br>
        <label for="isi">Isi</label><br>
        <textarea name="isi" rows="15" cols="100"></textarea><br>
        <label for="gambar">Gambar : </label>
        <input type="file" id="gambar" name="gambar"><br>
        <input type="submit" value="Create">
    </form>
    
    @include('footer')
</body>
</html>