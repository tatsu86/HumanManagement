@extends('_layout/header')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>フレンドリスト</h3>
    </div>
  </div>

  <form action="{{ url('/friend') }}" method="GET">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="name">名前</label>
        <input type="text" name="name" class="form-control" value={{ $name }}>
      </div>
      <div class="form-group col-md-4">
        <label>特徴</label>
        <input type="text" name="feature" class="form-control" value={{ $feature }}>
      </div>
    </div>

    <a href="/friend" class="btn btn-default">クリア</a>
    <input type="submit" class="btn btn-primary" value="検索">
    <a href="/friend/create" class="btn btn-success">新規登録</a>
  </form>


  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <table class="table text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">性</th>
          <th class="text-center">名</th>
          <th class="text-center">性別</th>
          <th class="text-center">特徴</th>
          <th class="text-center">編集</th>
        </tr>
        @foreach($friends as $friend)
        <tr>
          <td>
            {{ $friend->id }}
          </td>
          <td>{{ $friend->last_name }}</td>
          <td>{{ $friend->first_name }}</td>
          <td>{{ $friend->gender }}</td>
          <td>{{ $friend->feature }}</td>
          <td>
            <form action="/friend/{{ $friend->id }}/edit" method="get">
              <input type="hidden" name="id">
              <button type="submit" class="btn btn-primary">編集</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection