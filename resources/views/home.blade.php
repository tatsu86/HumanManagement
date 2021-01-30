@extends('_layout/header')
@section('content')

<h3>メニュー画面</h3>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route("friend.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-user-friends" style="height:3rem;"> フレンドリスト</button>
      </form>

      <form action="{{ route("friendContact.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-glass-cheers" style="height:3rem;"> コンタクトリスト</button>
      </form>

      <form action="{{ route("contactAnalysis.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-user-friends" style="height:3rem;"> コンタクト分析</button>
      </form>

      <form action="{{ route("friend.index") }}" style="margin-bottom:2rem;">
        <button type="submit" class="btn btn-secondary form-control fas fa-user-friends" style="height:3rem;"> 仮ボタン</button>
      </form>
    </div>
  </div>
</div>

@endsection