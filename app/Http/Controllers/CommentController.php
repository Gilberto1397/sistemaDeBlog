<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentFormRequest $r, $post)
    {
        $comment = new Comment();
        $comment->comment = $r->comment;
        $comment->userId = $r->userId;
        $comment->postId = $r->postId;
        $comment->save();

        return redirect()->route('post-show', ['post' => $post]);
    }
}
