<?php

namespace App\Http\Service;

use App\Http\Repository\Post\PostRepositoryInterface;
use App\Http\Repository\User\EloquentUserRepository;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostService
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function index()
    {
        return Post::all();
    }

    public function store(PostFormRequest $request)
    {
        $this->postRepository->store($request);
        return;
    }

    public function update(PostFormRequest $request, Post $post)
    {
        return $this->postRepository->update($request, $post);
    }
}
