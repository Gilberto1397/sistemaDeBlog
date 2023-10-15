<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PostController extends Controller
{
    public function index()
    {
        $message = !empty(session('message')) ? session('message') : null;
        return view('post.index', compact('message'));
    }

    public function create()
    {
        $userId = Auth::user()->id;
        return view('post.create', compact('userId'));
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->users_id = $request->userId;
        $post->postContent = $request->postContent;
        $post->createdDate = Date('Y-m-d');
        $post->createdTime = Date('H:i:s');

        if (!empty($request->file('image'))
            && $request->file('image')->getError() === UPLOAD_ERR_OK
            && str_starts_with($request->file('image')->getMimeType(), 'image/')) {

            $imagePath = $request->file('image')->store('postImages', 'public');
            $post->imagePath = $imagePath;
        }
        $post->save();
        return redirect()->route('home')->with('message', 'Post criado com sucesso!');
    }
}
