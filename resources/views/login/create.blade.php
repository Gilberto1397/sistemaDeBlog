@extends('components.main-layout')

@section('title', 'Login')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" value="{{$loggedUser}}" class="form-control" id="email" aria-describedby="emailHelp" required>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" {{($checked === true ? 'checked' : '')}} value="true" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                </div>
                <button type="submit" class="btn btn-primary">Acessar</button>
                <a class="btn btn-primary" aria-current="page" href="{{route('password.request')}}">Recuperar Senha</a>
                <a class="btn btn-primary" aria-current="page" href="{{route('authGoogle')}}">Acessar com o Google</a>
            </form>
        </div>
    </section>

@endsection
