<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
               @guest()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
