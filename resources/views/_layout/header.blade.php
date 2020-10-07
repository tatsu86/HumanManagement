<head>
  <title>Management Friends</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  <script src="{{ asset('/js/app.js') }}"></script>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  {{-- フォント追加 --}}
  <link href="https://fonts.googleapis.com/css?family=Caveat rel="stylesheet">
  {{-- アイコン追加 --}}
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <div class="title m-b-md" style="background-color: steelblue; padding:0 10">
    <a href="/" style="font-family:'Caveat', cursive; color:black; font-size:2rem; text-decoration:none;">
      Management Friends
    </a>
  </div>
</head>
<div>
  @yield('content')
</div>