<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blogging | @yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    </head>
    <body>
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

        <div class="container min-vh-100">
            <div class="row min-vh-100">
                {{--Sidebar--}}
                <div class="offcanvas-md offcanvas-start col-lg-3 min-vh-100 py-2" id="sidebar" tabindex="-1" data-toggle="collapse">
                    <div class="d-lg-none d-flex flex-row justify-content-end">
                        <a href="#sidebar" class="text-decoration-none text-black fw-bold display-1" data-bs-toggle="offcanvas">
                            <i class="bi bi-x"></i>
                        </a>
                    </div>

                    <div class="btn-group-vertical w-100">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-house"></i>
                            Home
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            Log in
                        </a>
                        <a href="#" class="btn btn-primary">
                            Create account
                        </a>
                        @auth
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-bookmark"></i>
                            Saved posts
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-book"></i>
                            My posts
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            My comments
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a>
                        <a href="#" class="btn btn-outline-danger">
                            Sign out
                        </a>
                        @endauth
                    </div>
                </div>

                {{--Content--}}
                <div class="col-lg-9 min-vh-100">
                    @yield('content')
                </div>

                {{--Extra sidebar--}}
                <!--<div class="col-lg-2 d-none d-lg-block min-vh-100">
                    @yield('extra')
                </div>-->

            </div>
        </div>
        <div class="container-fluid">
            {{--Footer--}}
            <div class="row bg-dark text-white">
                <div class="d-flex flex-column align-items-center py-4">
                    <p class="display-6">Blogging platform - built with Laravel.</p>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        
    </body>
</html>
