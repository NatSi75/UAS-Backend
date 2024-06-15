<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function createArticle(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $validatedData = new Article;

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:128',
            'body' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|in:lifestyle,crime,finance,sport,miscellaneous',
        ]);
        
        //Jika artikel memiliki gambar/image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename, 'public');
            $validatedData['image'] = $filename;
        }

        //Membuat objek Article untuk menyimpan datanya ke database
        $article = new Article($validatedData);
        $article->user_id= $user->id;
        $article->editor = $user->username;
        $article->save();

        //Redirect 
        return redirect('/profile');
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

    public function edit(Article $article){
         //mengarahkan user ke tampilan untuk update article
         //Compact berfungsi untuk mengirimkan data artikel ke tampilan Blade, sehingga dapat diakses dan ditampilkan dalam button edit
        return view('updateArticle', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
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
        return redirect('/profile');
    }
}