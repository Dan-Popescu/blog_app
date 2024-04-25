<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'content' => 'required|string',
            'article_id' => 'required|integer|exists:articles,id'
        ]);


        Comment::create([
            'content' => $validated_data['content'],
            'user_id' => auth()->id(),
            'article_id' => (int) $validated_data['article_id']
        ]);

        return back()->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to edit this comment.');
        }

        $validated_data = $request->validate([
            'content' => 'required|string'
        ]);

        $comment->update([
            'content' => $validated_data['content']
        ]);

        return Redirect::route('articles.show', $comment->article_id)->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    { 
        if ($comment->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to delete this comment.');
        }
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }
}
