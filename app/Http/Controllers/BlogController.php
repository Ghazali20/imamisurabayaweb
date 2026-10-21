<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Menampilkan daftar semua artikel (Halaman Arsip Blog / Kabar)
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    // Menampilkan detail artikel
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}