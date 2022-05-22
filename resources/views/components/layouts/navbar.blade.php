
        {{--Navbar--}}
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <button class="btn btn-outline-secondary d-lg-none my-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                        <i class="bi bi-list"></i> 
                    </button>
                    <a class="navbar-brand text-white bg-dark px-2 border rounded d-none d-lg-block" href="{{ route('home') }}">
                        Blog
                    </a>
                    <div class="d-none d-lg-block">
                        <form action="{{ route('home') }}" method="GET" class="form-control py-0 px-0 d-flex flex-row align-items-center">
                            <input name="search" class="border-0 flex-grow-1 p-1" placeholder="search...">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    
                    @auth
                    <div class="dropstart">
                        <a class="m-1" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown">
                            <img class="rounded-circle" src="https://i.pravatar.cc/50?img=68" width="50" height="50" />
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li>
                                <a href="#" class="dropdown-item">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Log out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
                
            </div>
        </nav>
