<?php

namespace App\Http\Service;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostService
{
    public function index()
    {
        return Post::all();
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->users_id = $request->userId;
        $post->postContent = $request->postContent;
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

        return;
    }
}
