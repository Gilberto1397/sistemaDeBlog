@extends('components.main-layout')

@section('title', 'Novo post+')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">
            <form method="post" enctype="multipart/form-data">
                @csrf

                <input name="userId" type="hidden" value="{{$userId}}">

                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="title" name="title" value="{{old('title')}}" class="form-control" placeholder="Título" id="title" aria-describedby="titleHelp" required>
                    @if($errors->has('title'))
                        @foreach($errors->get('title') as $error)
                            <p class="text-white">{{ "$error \n" }}</p>
                        @endforeach
                    @endif
                </div>

                <div class="mb-3">
                    <label for="post" class="form-label">Postagem</label>
                    <textarea name="postContent" class="form-control" id="post" placeholder="Escreva seu post aqui" style="height: 100px" required>{{old('postContent')}}</textarea>
                    @if($errors->has('postContent'))
                        @foreach($errors->get('postContent') as $error)
                            <p class="text-white">{{ "$error \n" }}</p>
                        @endforeach
                    @endif
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Enviar imagem</label>
                    <input name="image" class="form-control" type="file" accept="image/*" id="image">
                    @if($errors->has('image'))
                        @foreach($errors->get('image') as $error)
                            <p class="text-white">{{ "$error \n" }}</p>
                        @endforeach
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </section>

@endsection
