@extends('components.main-layout')

@section('title', 'Post')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="title" name="title" value="{{$post->title}}" class="form-control" disabled
                       placeholder="Título" id="title" aria-describedby="titleHelp" required>
            </div>

            <div class="mb-3">
                <label for="post" class="form-label">Postagem</label>
                <textarea name="postContent" class="form-control" id="post" placeholder="Escreva seu post aqui" disabled
                          style="height: 100px" required>{{$post->postContent}}</textarea>
            </div>

            <img src="{{asset('storage/' . $post->imagePath)}}" class="h-50 w-50">

            <form class="mt-5" method="post">
                @csrf
                <input name="userId" type="hidden" value="{{$post->users_id}}">
                <input name="postId" type="hidden" value="{{$post->id}}">
                <div class="mb-3">
                    <input type="text" name="comment" class="form-control" placeholder="Deixe um comentário" aria-describedby="emailHelp">
                    @if($errors->has('comment'))
                        @foreach($errors->get('comment') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>

                @if(count($comments) > 0)
                    @foreach($comments as $comment)
                        <p class="bg-black mt-3">{{ "$comment->comment \n" }}</p>
                    @endforeach
                @endif
            </form>
        </div>
    </section>

@endsection
