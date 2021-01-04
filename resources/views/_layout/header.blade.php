<head>
  <title>Management Friends</title>
  {{-- TODO:app.jsが読み込めない --}}
  <script src="{{ mix('js/app.js') }}" defer></script>
  <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
  

  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  {{-- フォント追加 --}}
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
  {{-- アイコン追加 --}}
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <nav class="navbar navbar-light" style="background-color: steelblue;">
    <a class="navbar-brand title" href="/">Management Friends</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="/friend">フレンド一覧</a>
        </li>
        <li class="nav-item">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              ログアウト
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">ログイン</a>
        </li>
        @endif
      </ul>
    </div>
  </nav>
</head>
  {{-- <button type="button" onclick="showAlert();">showAlert</button> --}}

  @yield('content')