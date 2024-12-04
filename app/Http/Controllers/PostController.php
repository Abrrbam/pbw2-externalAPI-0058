<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        return view('posts.index', ['posts' => $posts]);
    }

    public function edit($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'. $id);
        $posts = $response->json();

        return view('posts.edit', ['posts' => $posts]);
    }

    public function update(Request $request, $id)
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/'. $id, [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        if ($response->successful()) {
            return redirect()->route('posts.index')->with('success', 'Post updated succesfully!');
        }else{
            return redirect()->route('posts.index')->with('error', 'Failed to update post. Try again.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'. $id);
        if ($response->successful()) {
            return redirect()->route('posts.index')->with('success', 'Delete post successfully!');
        }else{
            return redirect()->route('posts.index')->with('error', 'Failed to delete post. Try again to delete.');
        }
    }
}
