<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::query()->select(['id', 'title', 'content', 'created_at'])->latest('created_at')->paginate(10);
        // return view('articles.index', ['articles'=> $articles]);

        $articles = Article::orderBy("created_at","desc")->paginate(10);
        return view("articles.index", ["articles" => $articles]);
    }

    /**
     * Display user articles
     */
    public function userArticles(){
        $articles = Article::query()->where('user_id', auth()->id())->select(['id', 'title', 'content', 'created_at'])->latest('created_at')->paginate(10);

        return view('articles.user', ['articles'=> $articles]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate request
        $validated_data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // store article
        $article = new Article();
        $article->title = $validated_data['title'];
        $article->content = $validated_data['content'];
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->intended(route('articles.create'))->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $user = $article->user()->select('id','name')->first();
        $categories = $article->categories()->select('categories.id','categories.name')->get();
        $comments = $article->comments()
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.id', 'comments.content', 'comments.created_at', 'users.name as user_name', 'users.id as user_id')
            ->orderBy('comments.created_at', 'desc')
            ->get();

        //dd($categories);
        return view('articles.show',["article" => $article,"user" => $user, "categories"=> $categories, "comments" => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated_data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // verify if the article belongs to the authenticated user
        if ($article->user_id !== auth()->id()) {
            return redirect()->intended(route('articles.index'))->with('error', 'You are not authorized to update this article.');
        }

        $updated = $article->update($validated_data);

        return redirect()->intended(route('articles.edit', $article))->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->intended(route('articles.index'))->with('success', 'Article deleted successfully.');
    }
}
