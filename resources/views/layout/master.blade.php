<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg text-white" style="background-color: rgb(50, 107, 198); padding-left: 1rem; padding-right: 1rem">
            <div class="container-fluid" style="background-color: rgb(50, 107, 198);">
              <a class="navbar-brand" href="#">ConnectFriends</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" style="margin-left: 20rem">
                  <li class="nav-item" style="padding-right: 1rem">
                    <a class="nav-link" @yield('activeHome') aria-current="page" href="{{ route('user.index') }}">@lang('translation.Home')</a>
                  </li>
                  <li class="nav-item" style="padding-right: 1rem">
                    <a class="nav-link" @yield('activeRequests') href="{{ route('requests.index') }}">@lang('translation.Requests')</a>
                  </li>
                  <li class="nav-item" style="padding-right: 1rem">
                    <a class="nav-link" @yield('activeFriends') href="{{ route('friendship.index') }}">@lang('translation.Friends')</a>
                  </li>
                  
                </ul>
              </div>

            @if (Auth::check())
                <div class="dropdown" style="margin-right: 3rem">
                    <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" style="background-color: inherit; border-color: inherit" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="padding-right: 0.5rem">Halo, {{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                        <li>
                            <form method="GET" action="{{ route('profile', ['id' => Auth::user()->id]) }}">
                                @csrf
                                <button type="submit" class="dropdown-item" style="background-color: none; border:none; text-align:left">
                                    @lang('translation.My Profile')
                                </button>
                            </form>
                        </li>
                        <li>
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item" style="background-color: none; border:none; text-align:left">
                                    @lang('translation.Log Out')
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="d-flex" style="margin-right: 7rem">
                    <a href="{{ url('/login') }}" class="btn btn-outline-light">Login</a>
                </div>
            @endif

            <div class="navbar-language dropdown" style="margin-right: 7rem">
              <button class="btn btn-light dropdown-toggle" style="background-color: inherit; border-color: inherit" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                  <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                  <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                </svg>
              </button>
              <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                <li><a class="dropdown-item" href="{{ route('locale', 'id') }}">Bahasa Indonesia</a></li>
              </ul>
            </div>

            </div>
          </nav>

        @yield('content')
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>