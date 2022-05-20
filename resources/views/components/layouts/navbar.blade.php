
        {{--Navbar--}}
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <button class="btn btn-outline-secondary d-lg-none my-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list"></i> 
                </button>
                <a class="navbar-brand text-white bg-dark px-2 border rounded d-none d-lg-block" href="{{ route('home') }}">
                    Blog
                </a>
                <div class="form-control py-0 px-0 d-flex flex-row align-items-center">
                    <input class="border-0 flex-grow-1 p-1" placeholder="search...">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </nav>
