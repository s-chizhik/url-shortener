<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('dashboard')}}">URL Shortener</a>

        @if(isset($user))
            <div class="d-flex text-light">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{$user->name}}</a>
                    </li>

                    <li style="border-left: 1px solid var(--bs-dark); margin: 0 10px;"></li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
