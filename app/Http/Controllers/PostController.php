<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request) {
        $post = new Post;
        $post->text = $request->text;
        $post->author_id = Auth::id();
        $post->save();
        return redirect('posts');
    }
}
