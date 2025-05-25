<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'link' => 'nullable|url',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
    ]);

    // Upload gambar jika ada
    if ($request->hasFile('img')) {
        $imgPath = $request->file('img')->store('news-images', 'public');
        $validated['img'] = $imgPath;
    }

    // Generate slug otomatis dari title
    $validated['slug'] = Str::slug($validated['title']);

    News::create($validated);

    return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan!');
}

    public function index()
    {
        $news = News::latest()->get();
        return view('berita', compact('news'));
    
    }
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('artikel', compact('news'));
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::delete($news->img); // Jika ingin menghapus gambar juga
        $news->delete();

        return redirect('/berita')->with('success', 'Artikel berhasil dihapus.');
    }

}