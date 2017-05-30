<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Thing;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->author_id = Auth::id();
        if($request->for == 'thing')
            $comment->commentable_type = Thing::class;
        $comment->commentable_id = $request->thing_id;
        $comment->save();
        return redirect(Thing::where(['id' => $request->thing_id])->first()->route);
    }
}
