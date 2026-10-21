<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicPostController extends Controller
{
    // Menampilkan form kirim kabar
    public function create()
    {
        return view('blog.create');
    }

    // Menyimpan kirim kabar dari publik (status default: pending / belum published)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'author_name' => $request->author_name,
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'is_published' => false, // Perlu disetujui admin dulu
        ]);

        return redirect()->route('blog.create')->with('success', 'Kabar berhasil dikirim! Berita kamu sedang menunggu tinjauan dari pengurus IMAMI sebelum ditayangkan.');
    }
}