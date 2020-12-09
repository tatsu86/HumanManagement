@include('_layout/errors')

<div class="btn-area">
  <ul>
    <li>
      {{-- TODO:戻るボタンを実装する --}}
      <button>戻る</button>
    </li>
    <li>
      @if($target == 'store')
      <button type="submit" form="frmMain" class="btn btn-primary">登録</button>
      @elseif($target == 'update')
      <button type="submit" form="frmMain" class="btn btn-primary">保存</button>
      @endif
    </li>
    @if($target == 'update')
    <li>
      <form action="{{ route("friendContact.destroy", ['id' => $contact->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">削除</button>
      </form>
    </li>
    @endif
  </ul>
</div>

@if($target == 'store')
<form id="frmMain" action="{{ route('friendContact.store', ['friend_id' => $contact->friend_id]) }}" method="post">
@elseif($target == 'update')
<form id="frmMain" action="{{ route('friendContact.update', ['id' => $contact->id]) }}" method="post">
@endif
  @csrf
  <input type="hidden" name="friend_id" value="{{ $contact->friend_id }}">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>連絡日時</label>
      <input type="date" name="contact_date" class="form-control" value="{{ $contact->contact_date }}">
    </div>
    

    <div class="form-group col-md-12">
      <label>内容</label>
      {{ Form::textarea('detail', $contact->detail, ['class' => 'form-control']) }}
    </div>
  </div>
</form>