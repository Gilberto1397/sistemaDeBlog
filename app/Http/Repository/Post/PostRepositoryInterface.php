<?php

namespace App\Http\Repository\Post;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;

interface PostRepositoryInterface
{
    public function store(PostFormRequest $request);

    public function update(PostFormRequest $request, Post $post);
}
