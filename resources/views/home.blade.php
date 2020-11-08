@extends('_layout/header')
@section('content')

<h3>メニュー画面</h3>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div style="margin-bottom:2rem;">
        <button class="btn btn-secondary form-control fas fa-user-friends" onclick="location.href='./friend'"> 友達一覧</button>
      </div>
      <div style="margin-bottom:2rem;">
        <button class="btn btn-secondary form-control fas fa-user-friends" onclick="location.href='./friend'"> ボタン２</button>
      </div>
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