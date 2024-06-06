<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function home() {
        $articles = Article::all();
        return view('home', ['articles' => $articles]);
    }

    public function detail(Request $request) {
        $article = Article::all()->where('id', $request->input('id'));
        return view('detailArticle', ['article'=> $article]);
    }

    public function filter(Request $request) {
        $articles = Article::where('kategori', $request->input('kategori'))->get();
        return view('filter', ['articles'=> $articles]);
    }

    public function delete(Request $request) {
        $article = Article::where('id', $request->input('id'));
        $article->delete();
        return redirect('/profile');
    }
}