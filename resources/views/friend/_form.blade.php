<div class="container">
  <h3>編集画面</h3>

  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      @if($target == 'store')
      <form action="/friend" method="post">
      @elseif($target == 'update')
      <form action="/friend/{{ $friend->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="last_name">姓</label>
          <input type="text" class="form-control" name="last_name" value="{{ $friend->last_name }}">
        </div>
        <div class="form-group">
          <label for="first_name">名</label>
          <input type="text" class="form-control" name="first_name" value="{{ $friend->first_name }}">
        </div>
        <div class="form-group"> 
          <label for="jender">性別</label>
          {{Form::select('jender', ['男', '女'])}}
        </div>
        <div class="form-group">
          <label for="feature">特徴</label>
          <input type="text" class="form-control" name="feature" value="{{ $friend->feature }}">
        </div>
        @if($target == 'store')
          <button type="submit" class="btn btn-primary">登録</button>
        @elseif($target == 'update')
        <button type="submit" class="btn btn-primary">保存</button>
        @endif
        
        <a href="/friend">戻る</a>
      </form>
      <form action="/friend/{{ $friend->id }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">

        <input type="submit" value="削除" class="btn btn-danger alert-del" style="float:right;">
      </form>
    </div>
  </div>
</div>