@extends('components.main-layout')

@section('title', 'Login')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" aria-describedby="emailHelp" required>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" {{old('password')}} class="form-control" id="password" required>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Usuário</label>
                    <input type="user" name="user" {{old('user')}} class="form-control" id="user" required>
                    @if($errors->has('user'))
                        @foreach($errors->get('user') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </section>

@endsection
