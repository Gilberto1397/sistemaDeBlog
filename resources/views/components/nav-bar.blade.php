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
                @auth()
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        @method('DELETE')
                        <li class="nav-item">
                            <button type="submit" class="nav-link">Logout</button>
                        </li>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
