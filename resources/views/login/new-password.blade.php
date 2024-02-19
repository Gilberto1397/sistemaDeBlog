@extends('components.main-layout')

@section('title', 'Login')

@section('content')

    <section class="d-flex justify-content-center mt-5 text-white">
        <div class="w-75">
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail cadastrado</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            {{ "$error \n" }}
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>

@endsection
