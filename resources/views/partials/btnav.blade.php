<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">後台管理</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ action('SchoolController@schools') }}">學校</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">獎學金</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">我不知道</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">同鄉會嗎?</a>
      </li>
    </ul>
  </div>
</nav>