@extends('_layout/header')
@section('content')

<h3>詳細画面</h3>

<div class="form-group">
  <label for="last_name">姓</label>
  <input type="text" class="form-control" name="last_name" value="{{ $friend->last_name }}">
</div>
<div class="form-group">
  <label for="first_name">名</label>
  <input type="text" class="form-control" name="first_name" value="{{ $friend->first_name }}">
</div>
<div class="form-group">
  <label for="feature">特徴</label>
  <input type="text" class="form-control" name="feature" value="{{ $friend->feature }}">
</div>
<button type="submit" class="btn btn-default">登録</button>
<a href="/friend">戻る</a>

@endsection