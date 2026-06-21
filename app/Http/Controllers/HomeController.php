<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPost = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->first();

        $posts = Post::where('status', 'published')
            ->latest()
            ->limit(2)
            ->get();

        return view('home', compact('featuredPost', 'posts'));
    }

}
