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
        return view('post.post-form', compact('userId'));
    }

    public function store(PostFormRequest $request)
    {
        $this->postService->store($request);
        return redirect()->route('home')->with('message', 'Post criado com sucesso!');
    }

    public function edit(Post $post)
    {
        $userId = $post->users_id;
        return view('post.post-form', compact('post', 'userId'));
    }

    public function update(PostFormRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->postContent = $request->postContent;
        $post->users_id = $request->userId;
        $post->createdDate = Date('Y-m-d');
        $post->createdTime = Date('H:i:s');
        $post->imagePath = 'postImages/imageDefault.jpg';

        if (!empty($request->file('image'))
            && $request->file('image')->getError() === UPLOAD_ERR_OK
            && str_starts_with($request->file('image')->getMimeType(), 'image/')) {

            $imagePath = $request->file('image')->store('postImages', 'public');
            $post->imagePath = $imagePath;
        }

        $post->save();
        return redirect()->route('home')->with('message', 'Post atualizado com sucesso!');
    }

    public function destroy($post)
    {
        Post::destroy($post);
        return redirect()->route('home')->with('message', 'Post excluído com sucesso!');
    }
}
