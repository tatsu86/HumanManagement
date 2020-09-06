<div class="row">
  <div class="col-md-8 col-md-offset-1">
    @if($target == 'store')
    <form action="/human" method="post">
    @elseif($target == 'update')
    <form action="/human/{{ $human->id }}" method="post">
      <input type="hidden" name="_method" value="PUT">
    @endif
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="last_name">姓</label>
        <input type="text" class="form-control" name="last_name" value="{{ $human->last_name }}">
      </div>
      <div class="form-group">
        <label for="first_name">名</label>
        <input type="text" class="form-control" name="first_name" value="{{ $human->first_name }}">
      </div>
      <div class="form-group">
        <label for="feature">特徴</label>
        <input type="text" class="form-control" name="feature" value="{{ $human->feature }}">
      </div>
      <button type="submit" class="btn btn-default">登録</button>
      <a href="/human">戻る</a>
    </form>
  </div>
</div>