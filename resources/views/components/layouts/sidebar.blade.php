                {{--Sidebar--}}
                <div class="offcanvas-md offcanvas-start col-lg-3 min-vh-100 py-2" id="sidebar" tabindex="-1" data-toggle="collapse">
                    <div class="d-lg-none d-flex flex-row justify-content-end">
                        <a href="#sidebar" class="text-decoration-none text-black fw-bold display-1" data-bs-toggle="offcanvas">
                            <i class="bi bi-x"></i>
                        </a>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" style="position: sticky; top: 1rem;">
                        @csrf
                        <div class="btn-group-vertical w-100" style="position: sticky; top: 1rem;">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                                <i class="bi bi-house"></i>
                                Home
                            </a>
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                Create account
                            </a>
                            @endguest
                            @auth
                            <a href="{{ route('saved_post.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-bookmark"></i>
                                Saved posts
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-book"></i>
                                My posts
                            </a>
                            <a href="{{ route('post.create') }}" class="btn btn-outline-primary">
                                <i class="bi bi-pen"></i>
                                Create post
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-gear"></i>
                                Settings
                            </a>
                            <button type="submit" class="btn btn-outline-danger">
                                Sign out
                            </button>
                            @endauth
                        </div>
                    </form>
                </div>
