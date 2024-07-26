<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $posts = Post::with('user')->where('user_id', $userId)->get();

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function allPosts()
    {
        return response()->json(Post::with('user')->get());
    }   

    public function createTestPosts()
    {
        DB::table('posts')->insert([
            ['user_id' => 2, 'content' => 'test post 1'],
            ['user_id' => 2, 'content' => 'test post 2'],
            ['user_id' => 2, 'content' => 'test post 3'],
        ]);

        return response()->json(['message' => 'Test posts created']);
    }
}
