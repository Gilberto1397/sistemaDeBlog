@extends('components.main-layout')

@section('title', 'Login')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">
            <form method="post" action="{{route('password.update')}}">
                @csrf

                <input type="hidden" value="{{$token}}" name="token">

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
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
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Senha</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    @if($errors->has('password_confirmation'))
                        @foreach($errors->get('password_confirmation') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Regerar</button>
            </form>
        </div>
    </section>

@endsection
