<nav class="navbar navbar-expand-lg navbar-light navbar-default">
    <div class="container">
        <a href="{{ url('/') }}" class="nav-brand">Hello Laravel</a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a href="{{ action('BoardController@getIndex') }}" class="nav-link">
                    排行榜
                </a>
            </li>
            @auth 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        {{ Auth::user()->name }}，你好
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ action('SchoolController@edit') }}">編輯我的資料</a>
                        <a class="dropdown-item" href="{{ action('AuthController@getLogout') }}">登出</a>
                    </div>
                </li>
            @else
                <li class="nav-item active">
                    <a href="{{ action('AuthController@getLogin') }}" class="nav-link">登入</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>