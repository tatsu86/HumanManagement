<div class="container" style="margin-botton:100px;">
  @if($target == 'store')
  <h3>フレンド登録</h3>
  @elseif($target == 'update')
  <h3>フレンド編集</h3>
  @endif

  @include('_layout/errors')

  <div class="btn-area">
    <ul>
      <li>
        <form id="frmBack" action="{{ url()->previous() }}">
          <button type="submit" form="frmBack" class="btn btn-secondary">戻る</button>
        </form>
      </li>
      <li>
        @if($target == 'store')
        <button type="submit" form="frmMain" class="btn btn-primary">登録</button>
        @elseif($target == 'update')
        <button type="submit" form="frmMain" class="btn btn-primary">保存</button>
        @endif
      </li>
    </ul>
  </div>

  @if($target == 'store')
  <form id="frmMain" action="/friend" method="post" enctype="multipart/form-data">
  @elseif($target == 'update')
  <form id="frmMain" action="/friend/{{ $friend->id }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
  @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{-- TODO:画像アップロード --}}
    @if (!empty($friend->profile_img))
    <img src="{{ asset('storage/img/' . $friend->profile_img) }}" class="profile-img">
    @else
    <img src="{{ asset('img/unknown.png') }}" class="profile-img">
    @endif
    <input type="file" name="profile_img">

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">名前(漢字)</label>
        <input type="text" class="form-control" name="name" value="{{ $friend->name }}" placeholder="名前(漢字)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name_kana">名前(カナ)</label>
        <input type="text" class="form-control" name="name_kana" value="{{ $friend->name_kana }}" placeholder="名前(カナ)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3"> 
        <label for="gender">性別</label>
        {{Form::select('gender', ['男' => '男', '女' => '女'], old('gender', $friend->gender ), ['placeholder' => '選択してください', 'class' => 'form-control'])}}
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="feature">特徴</label>
        <input type="text" class="form-control" name="feature" value="{{ $friend->feature }}" placeholder="">
      </div>
    </div>
    <div class="form-group">
      <label for="detail">詳細</label>
      {{ Form::textarea('detail', $friend->detail, ['class' => 'form-control'])}}
    </div>
  </form>
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
