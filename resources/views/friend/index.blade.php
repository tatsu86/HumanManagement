@extends('_layout/header')
@section('content')

<div class="container-fluid">
  <h3>フレンドリスト</h3>

  <form action="{{ url('/friend') }}" method="GET">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="name">名前</label>
        <input type="text" name="name" class="form-control" value="{{ $name }}" placeholder="名前">
      </div>
      <div class="form-group col-md-3"> 
        <label for="gender">性別</label>
        {{Form::select('gender', ['男' => '男', '女' => '女'], $gender, ['placeholder' => '性別', 'class' => 'form-control'])}}
      </div>
      <div class="form-group col-md-4">
        <label>特徴</label>
        <input type="text" name="feature" class="form-control" value="{{ $feature }}" placeholder="特徴">
      </div>
    </div>

    <a href="/friend" class="btn btn-secondary">クリア</a>
    <input type="submit" class="btn btn-primary" value="検索">
    <a href="/friend/create" class="btn btn-success">新規登録</a>
  </form>

  <div class="row">
    {{-- <div class="col-md-11 col-md-offset-1"> --}}
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center"></th>
            <th class="text-center">名前(漢字)</th>
            <th class="text-center">名前(カナ)</th>
            <th class="text-center">性別</th>
            <th class="text-center">特徴</th>
            <th class="text-center" style="width:5rem;">編集</th>
          </tr>
        </thead>
        <tbody>
          @foreach($friends as $friend)
          <tr>
            <td>
              @if (!empty($friend->profile_img))
              <img src="{{ asset('storage/img/' . $friend->profile_img) }}" class="profile-img-sm">
              @else
              <img src="{{ asset('img/unknown.png') }}" class="profile-img-sm">
              @endif
              
            </td>
            <td>{{ $friend->name }}</td>
            <td>{{ $friend->name_kana }}</td>
            <td>{{ $friend->gender }}</td>
            <td>{{ $friend->feature }}</td>
            <td style="width:5rem;">
              <form action="/friend/{{ $friend->id }}" method="get">
                <input type="hidden" name="id">
                <button type="submit" class="btn btn-primary">編集</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{-- </div> --}}
  </div>
</div>
@endsection