<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                </li>

               @guest()
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                @endguest

                @guest()
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('new-user-get')}}">Criar conta</a>
                    </li>
                @endguest

                @auth()
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('newPost-get')}}">Novo post &#43;</a>
                    </li>
                @endauth
            </ul>
        </div>

        @auth()
            <div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->user}}
                    </button>

                    <ul class="dropdown-menu" style="left: -75px">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            @method('DELETE')
                            <li>
                                <button type="submit" class="dropdown-item">Logout</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        @endauth
    </div>
</nav>
