<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">SIMAKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item text-center">
                        <a class="nav-link {{ Request::is('/') ? 'text-primary' : '' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link {{ Request::is('blog') ? 'text-primary' : '' }}" href="/blog">Articles</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link {{ Request::is('blog/topics/list') ? 'text-primary' : '' }}"
                            href="/blog/topics/list">Category</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link {{ Request::is('about') ? 'text-primary' : '' }}" href="/about">About</a>
                    </li>
                </ul>
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDarkDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"> Hi,
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="/dashboard">
                                        <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="bi bi-box-arrow-left"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link btn btn-primary text-white">Register</a>
                        </li>
                    </ul>
                @endauth
        </div>
    </nav>
