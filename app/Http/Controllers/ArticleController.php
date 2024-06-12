<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function createArticle(Request $request): RedirectResponse
    {
        $validatedData = new Article;

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:64',
            'body' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|in:lifestyle,crime,finance,sport,miscellaneous',
        ]);
        
        //Jika artikel memiliki gambar/image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time () .'.'. $image->getClientOriginalExtension();
            $image -> storeAs('images', $filename, 'public'); // 'public' = Nama disk dalam config > filesystems.php
            $validatedData['image'] = $filename;
        };

        //menghapus image dari array validatedData
        unset($validatedData['image']);

        //Membuat objek Article untuk menyimpan datanya ke database
        $article = new Article($validatedData);
        $article->save();

        //Redirect 
        return redirect('/');
    }

    public function home() {
        $articles = Article::all();
        return view('home', ['articles' => $articles]);
    }

    public function detail(Request $request) {
        $article = Article::find($request->input('id'));
        $articles = Article::where('category', $article->category)->get();
        return view('detailArticle', ['article'=> $article, 'articles'=>$articles]);
    }

    public function filter(Request $request) {
        $articles = Article::where('category', $request->input('kategori'))->get();
        return view('filter', ['articles'=> $articles]);
    }

    public function delete(Request $request) {
        $article = Article::where('id', $request->input('id'));
        $article->delete();
        return redirect('/profile');
    }

    public function search(Request $request) {
        $searchTitle = $request->input('title');
        if(empty($searchTitle)) {
            $articles = Article::orderBy('created_at', 'asc')->get();
        } else {
            $articles = Article::whereRaw('title ILIKE ?', ['%' . $searchTitle . '%'])->orderBy('created_at', 'asc')->get();
        }
        return view('search', ['articles'=> $articles, 'searchTitle'=> $searchTitle]);
    }

    public function update() {
        return view('updateArticle');
    }
}