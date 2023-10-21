@extends('components.main-layout')

@section('content')

    <div class="d-flex column-gap-5">
        @foreach($posts as $post)
            <div class="card w-25" style="width: 18rem;">
                <img src="{{asset('storage/' . $post->imagePath)}}" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>

                    <p class="card-text">{{$post->title}}</p>

                    <div class="d-flex column-gap-3">
                        <a href="{{route('post-edit', ['post' => $post->id])}}" class="btn btn-primary">&#9998; Editar</a>

                        <form method="post" action="{{route('post-destroy', ['post' => $post->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">&#128465; Excluir</button>
                        </form>

                        <a href="{{route('post-show', ['post' => $post->id])}}" class="btn btn-primary">&#9689; Comentar</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

@endsection
