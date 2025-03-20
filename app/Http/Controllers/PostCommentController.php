<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function __construct(){
        $this->middleware('auth')->only('store');
    }*/

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
    public function store(Request $request, Post $post)
    {
        if (!auth()->check()) {
            Session::put('pending_comment', [
                'post_id' => $post->id,
                'body' => $request->body,
            ]);

            return redirect()->route('login');
        }

        // Validatie
        $request->validate([
            'body' => 'required|string',
        ]);

        // Comment opslaan
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Comment toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment)
    {
        //
    }
}
