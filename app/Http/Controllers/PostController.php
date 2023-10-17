<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Service\PostService;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PostController extends Controller
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $message = !empty(session('message')) ? session('message') : null;
        $posts = $this->postService->index();
        //dd($posts);
        return view('post.index', compact('message', 'posts'));
    }

    public function create()
    {
        $userId = Auth::user()->id;
        return view('post.create', compact('userId'));
    }

    public function store(PostFormRequest $request)
    {
        $this->postService->store($request);
        return redirect()->route('home')->with('message', 'Post criado com sucesso!');
    }
}
