<div class="container">
  @if($target == 'store')
  <h3>フレンド登録</h3>
  @elseif($target == 'update')
  <h3>フレンド編集</h3>
  @endif

  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      @if($target == 'store')
      <form id="frmMain" action="/friend" method="post">
      @elseif($target == 'update')
      <form id="frmMain" action="/friend/{{ $friend->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{-- <div class="form-group">
          <label for="last_name">姓</label>
          <input type="text" class="form-control" name="last_name" value="{{ $friend->last_name }}">
        </div>
        <div class="form-group">
          <label for="first_name">名</label>
          <input type="text" class="form-control" name="first_name" value="{{ $friend->first_name }}">
        </div> --}}
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
        <div class="form-group"> 
          <label for="jender">性別</label>
          {{Form::select('jender', ['' => '選択してください']+['男' => '男', '女' => '女'], old('jender', $friend->jender ), ['class' => 'form-control'])}}
          {{-- {{ $jender_list = ['男', '女'] }}
          <select name="jender">
            <option value="">選択してください。</option>
            @foreach($jender_list as $jender)
              @if($jender === $frined->jender)
                <option value="{{ $jender }}" selected>{{ $jender }}</option>
              @else
                <option value="{{ $jender }}">{{ $jender }}</option>
              @endif
            @endforeach
          </select> --}}
        </div>
        <div class="form-group">
          <label for="feature">特徴</label>
          {{-- <textarea class="form-control" name="feature" value="{{ $friend->feature }}"></textarea> --}}
          {{ Form::textarea('feature', $friend->feature, ['class' => 'form-control'])}}
        </div>
      </form>
    </div>
  </div>
</div>

{{-- <button type="button" onclick="showAlert();">alert</button> --}}

{{-- fixed-bottom --}}
<div class="popup-footer">
  <div class="container-fluid" style="display:flex;">
        @if($friend->id <> "")
        <form action="/friend/{{ $friend->id }}" method="post" >
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit"class="btn btn-danger" onClick="deleteAlert();return false;">削除</button>
        </form>
        @endif

        @if($target == 'store')
        <button type="submit" form="frmMain" class="btn btn-primary">登録</button>
        @elseif($target == 'update')
        <button type="submit" form="frmMain" class="btn btn-primary">保存</button>
        @endif

  </div>
</div>





{{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h5 class="modal-title" id="deleteModal">削除してもよろしいですか？</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      この処理は元に戻せません。
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      <form id="frmDelete" action="{{ route('friend.destroy', ['id' => $friend->id]) }}" method="delete">
        @csrf
        <input type="hidden" name="id" value="{{ old('id', $friend->id) }}">
        <button type="submit" form="frmDelete" class="btn btn-danger">削除</button>
      </form>
    </div>
  </div>
</div> --}}

{{-- +TODO:resources/js/app.jsに記述して動かしたい --}}
{{-- <script>
  function deleteAlert() {
    if(!window.confirm('本当に削除しますか？')){
      return false;
    }
    document.deleteform.submit();
  }
</script> --}}
