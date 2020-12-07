@extends('_layout/header')
@section('content')
<div class="container">
  <h3>連絡登録フォーム</h3>

  @include('_layout/errors')

  <form action="{{ route('friendContact.store', ['friend_id' => $contact->friend_id ]) }}" method="post">
    @csrf
    <input type="hidden" value="{{ $contact->friend_id }}">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label>連絡日時</label>
        <input type="date" name="contact_date" class="form-control" value="">
      </div>
      

      <div class="form-group col-md-12">
        <label>内容</label>
        {{ Form::textarea('detail', $contact->detail, ['class' => 'form-control']) }}
      </div>
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
  </form>
</div>
@endsection