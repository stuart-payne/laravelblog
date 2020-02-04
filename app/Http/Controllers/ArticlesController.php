<?php

namespace app\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);

        $article = Article::create([
            'title' => request('title'),
            'description' => request('description'),
            'content' => request('content'),
            'user_id' => Auth::user()->id
        ]);

        return redirect("/articles/{$article->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if(!$article) {
            abort(404);
        }
        $comments = Comment::where('article_id', $id)->take(10)->get();
        return view('articles.show', ['article' => $article, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);

        $article->update([
            'title' => request('title'),
            'description' => request('description'),
            'content' => request('content')
        ]);

        return redirect("/articles/{$article->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(Auth::user()->id != $article->user_id){
            abort(403);
        }
        $article->delete();
        return redirect("/");
    }
}
