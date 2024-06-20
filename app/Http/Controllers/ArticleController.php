<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Articles;
use App\Models\Comments;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function createArticle(Request $request): RedirectResponse
    {
        $editor = Auth::user();
        $validatedData = new Articles;

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:128',
            'body' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|in:lifestyle,crime,finance,sport,miscellaneous',
        ]);
        
        //Jika artikel memiliki gambar/image
        $image = $request->file('image');
        $filename = time () .'.'. $image->getClientOriginalExtension();
        $image -> storeAs('images', $filename, 'public'); // 'public' = Nama disk dalam config > filesystems.php
        $validatedData['image'] = $filename;

        //Membuat objek Article untuk menyimpan datanya ke database
        $article = new Articles($validatedData);
        $article->editor = $editor->username;
        $article->save();

        //Redirect 
        return redirect('/profile')->with('successCreate','Create Article Berhasil!');
    }

    public function home() {
        $articles = Articles::all();
        return view('home', ['articles' => $articles]);
    }

    public function detail(Request $request) {
        $article = Articles::find($request->input('id'));
        $articles = Articles::where('category', $article->category)->where('id', '!=', $request->input('id'))->get();
        $comments = Comments::where('article_id', $article->id)->get();
        return view('detailArticle', ['article'=> $article, 'articles'=>$articles, 'comments'=>$comments]);
    }

    public function filter(Request $request) {
        $articles = Articles::where('category', $request->input('kategori'))->get();
        return view('filter', ['articles'=> $articles]);
    }

    public function delete(Request $request) {
        $article = Articles::where('id', $request->input('id'));
        $article->delete();
        return redirect('/profile')->with('deleteCreate','Delete Article Berhasil!');
    }

    public function search(Request $request) {
        $searchTitle = $request->input('title');
        if(empty($searchTitle)) {
            $articles = Articles::orderBy('created_at', 'asc')->get();
        } else {
            $articles = Articles::where('title', 'ILIKE', '%' . $searchTitle . '%')->orderBy('created_at', 'asc')->get();
        }
        return view('search', ['articles'=> $articles, 'searchTitle'=> $searchTitle]);
    }

    public function comment(Request $request) {
        $editor = Auth::user();
        $comment = new Comments();
        
        if (Auth::check()) {
            $comment->username = $editor->username;
        } else {
            $comment->username = 'Guest';
        }

        $comment->article_id = $request->input('article_id');
        $comment->comment = $request->input('comment');
        $comment->save();

        return back();
    }

    public function edit(Articles $article){
        //mengarahkan user ke tampilan untuk update article
        //Compact berfungsi untuk mengirimkan data artikel ke tampilan Blade, sehingga dapat diakses dan ditampilkan dalam button edit
       return view('updateArticle', compact('article'));
   }

   public function update(Request $request, Articles $article): RedirectResponse
   {
       //Melakukan validasi untuk data yang diterima ketika user update
       $validatedData = $request->validate([
           'title' => 'required|min:5|max:64',
           'body' => 'required|min:5',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'category' => 'required|in:lifestyle,crime,finance,sport,miscellaneous',
       ]);

       //Jika user ingin update image, maka image lama dihapus dan digantikan dengan image baru
       if ($request->hasFile('image')) {
           //Menghapus image lama
           Storage::disk('public')->delete('images/' . $article->image);
           //Menyimpan image baru
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $image->storeAs('images', $filename, 'public');
           $validatedData['image'] = $filename;
       } else {
           // Jika tidak ada image baru, maka tetap menggunakan image lama
           $validatedData['image'] = $article->image;
       }

       // Update artikel sesuai dengan data yang telah divalidasi
       $article->update($validatedData);

       // Redirect user ke profile
       return redirect('/profile')->with('updateCreate','Update Article Berhasil!');
   }
}