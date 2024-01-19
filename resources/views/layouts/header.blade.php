<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .nav-item {
            margin-right: 20px;
        }

        .navbar-brand img {
            padding: 20px;
        }

        .nav-item .test {
            justify-content: space-between
        }

        ul {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
    </style>
</head>

<body>
    <header class="w-100">
        <nav class="navbar navbar-expand-lg">

            <a class="navbar-brand" href="{{ route('homepage.index') }}">
                <img class="align-middle" src="{{ asset('images/F1Reg_logo.png') }}" alt="" width="auto"
                    height="90">
            </a>
            <div class="col-1"></div>
            <ul class="navbar-nav bg-white w-100 d-flex">
                <li class="nav-item" style="margin-left: 10px;"><a class="nav-link"
                        href="{{ route('homepage.index') }}">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('leaderboards') }}">Leaderboards</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profiles') }}">All Players</a></li>
                @auth
                    <!-- This only shows if the user is logged in by using the blade auth method built in laravel -->
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAdpJREFUaEPtmOtNxDAQhOc64SoBOuEqASqBTjgqASoBjRRL0eHY6511cobsn4t0djLfvvw4YHA7DK4fO8DWEewRgRsADwBuAdwB+ARwBvA1/fI5zCIBkvDHirpnAE9RBFEA9PRbgyhG5X6KTsO030OjAD4AMAItRohjy4Tc2AgAep4R8NgrgJNnYpqjArSmTk4rU8ld2CoAi7FWtDUHS0WtArxMLbMmsvQ/vc8ouEwF8BTvpVCpmK8BgEBuHe6JkxuVDpQiIXUiFWD4Ih6+jTINlE4kpY9UPLNWwi0Ea2HYrQRZWiHYOrmFcK/AUVuJeU+3bqfltJl/VO1CudWTICzudKDhGHr8HQDF8znMegCEibO8aAeweKnnmH8fgfkNBJ8ta0Eq4lTYbKXuduqNALsMV2CLYEsGEYYHG3apJmsFoGAK956Ba+KabytaACI2bjWAtGaYo2EFWEt8AjRvNSwATBseHdc2UzpZACJOXV746nm5BsBLWhbtlla8N6oBRNw6qPDFKJQA1i7cEuhiFEoAEQd21ftp/uLtXQlgy+K9BF+8vSsBXEP+z9eF7FV8CeA7Kv4B71ks5FEA6IOs1j8NEBD5/q+oLWT9FYhf2AFEB8rT9wjILhRf8AOPWlAxCRufwQAAAABJRU5ErkJggg=="
                                    height="24" class="mr-2" alt="Profile Icon">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    <!-- If user is not logged in it executes the else statement which shows 'logout' as text -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>
</body>

</html>
