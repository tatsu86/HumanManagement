<div class="container" style="margin-botton:100px;">
  @if($target == 'store')
  <h3>フレンド登録</h3>
  @elseif($target == 'update')
  <h3>フレンド編集</h3>
  @endif

  @if($target == 'store')
  <form id="frmMain" action="/friend" method="post">
  @elseif($target == 'update')
  <form id="frmMain" action="/friend/{{ $friend->id }}" method="post">
    <input type="hidden" name="_method" value="PUT">
  @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="last_name">姓</label>
        <input type="text" class="form-control" name="last_name" value="{{ $friend->last_name }}" placeholder="姓">
      </div>
      <div class="form-group col-md-6">
        <label for="first_name">名</label>
        <input type="text" class="form-control" name="first_name" value="{{ $friend->first_name }}" placeholder="名">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3"> 
        <label for="gender">性別</label>
        {{Form::select('gender', ['男' => '男', '女' => '女'], old('gender', $friend->gender ), ['placeholder' => '選択してください', 'class' => 'form-control'])}}
      </div>
    </div>
    <div class="form-group">
      <label for="feature">特徴</label>
      {{ Form::textarea('feature', $friend->feature, ['class' => 'form-control'])}}
    </div>
  </form>

  <div class="footer">
    <ul>
      <li>
        @if($friend->id <> "")
        <form action="/friend/{{ $friend->id }}" method="post" >
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit"class="btn btn-danger" onClick="return deleteAlert();">削除</button>
        </form>
        @endif
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
