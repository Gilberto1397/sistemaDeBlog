@extends('components.main-layout')

@section('content')

    <div class="d-flex column-gap-5">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/' . $post->imagePath)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->title}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
