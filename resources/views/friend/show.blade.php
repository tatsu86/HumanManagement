@extends('_layout/header')
@section('content')
<div class="container" style="margin-botton:100px;">
  <h3>フレンド詳細</h3>

  <div class="btn-area">
    <ul>
      @if($friend->id <> "")
      <li>
        <form action="/friend/{{ $friend->id }}/edit" method="get">
          <button type="submit" class="btn btn-secondary">編集</button>
        </form>
      </li>
      <li>
        <form action="/friend/{{ $friend->id }}" method="post" >
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit"class="btn btn-danger" onClick="return deleteAlert();">削除</button>
        </form>
      </li>
      @endif
    </ul>
  </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  {{-- TODO:画像表示 --}}
  @if (!empty($friend->profile_img))
  <img src="{{ asset('storage/img/' . $friend->profile_img) }}" class="profile-img">
  @else
  <img src="{{ asset('img/unknown.png') }}" class="profile-img">
  @endif


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">名前(漢字)</label>
      <input type="text" class="form-control" name="name" value="{{ $friend->name }}" placeholder="名前(漢字)" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name_kana">名前(カナ)</label>
      <input type="text" class="form-control" name="name_kana" value="{{ $friend->name_kana }}" placeholder="名前(カナ)" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3"> 
      <label for="gender">性別</label>
      {{Form::select('gender', ['男' => '男', '女' => '女'], old('gender', $friend->gender ), ['placeholder' => '選択してください', 'class' => 'form-control', 'readonly'])}}
    </div>
  </div>
  <div class="form-group">
    <label for="feature">特徴</label>
    {{ Form::textarea('feature', $friend->feature, ['class' => 'form-control', 'readonly'])}}
  </div>

</div>

{{-- <button type="button" onclick="showAlert();">alert</button> --}}

<script>
  function deleteAlert() {
    if(!window.confirm('本当に削除しますか？')){
      return false;
    }
    document.deleteform.submit();
  }
</script>
@endsection
