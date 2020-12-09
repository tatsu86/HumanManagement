@extends('_layout/header')
@section('content')

<h3>メニュー画面</h3>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route("friend.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-user-friends">友達一覧</button>
      </form>

      <form action="{{ route("friendContact.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-user-friends">進捗一覧</button>
      </form>

      <div style="margin-bottom:2rem;">
        <button class="btn btn-secondary form-control fas fa-user-friends" onclick="location.href='./friend'"> ボタン３</button>
      </div>
      <div style="margin-bottom:2rem;">
        <button class="btn btn-secondary form-control fas fa-user-friends" onclick="location.href='./friend'"> ボタン４</button>
      </div>
    </div>
  </div>
</div>

@endsection