@extends('_layout/header')
@section('content')

@if (session('success'))
<div class="alert alert-success flash_message">
  {{ session('success') }}
</div>
@endif

<div class="container" style="margin-botton:100px;">
  <h3>フレンド詳細</h3>

  <div class="btn-area">
    <ul>
      @if($friend->id <> "")
      <li>
        <form id="frmBack" action="{{ route('friend.index') }}">
          <button type="submit" form="frmBack" class="btn btn-secondary">戻る</button>
        </form>
      </li>
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
  <input type="hidden" name="friend_id" value="{{ $friend->id }}">

  {{-- TODO:画像表示 --}}
  @if (!empty($friend->profile_img))
  <img src="{{ asset('storage/img/' . $friend->profile_img) }}" class="profile-img">
  @else
  <img src="{{ asset('img/unknown.png') }}" class="profile-img">
  @endif

  @if (!empty($friend->name))
  <p style="font-weight:bold; font-size:1.2rem;">{{$friend->name}}</p>
  @endif

  @if (!empty($friend->gender))
  <p>{{$friend->gender}}</p>
  @endif
  
  @if (!empty($friend->feature))
  <p>{{$friend->feature}}</p>
  @endif

  @if (!empty($friend->detail))
  <p>{{$friend->detail}}</p>
  @endif

  {{-- TODO:コンタクト履歴を表示する --}}
  <div class="contact_section">
    <div style="margin-bottom:0.5rem;">
      <strong><span style="font-weigth:bold;">コンタクト一覧</span></strong>
      <form action="{{ route('friendContact.create', [$friend->id, 'friend']) }}" style="display:inline;">
        <input type="hidden" value="{{ $friend->id }}">
        <button type="submit" class="btn btn-success fas fa-edit"></button>
      </form>
    </div>
    @include('friendContact/list', ['contacts' => $friend->contacts])
  </div>
</div>

<script>
  function deleteAlert() {
    if(!window.confirm('本当に削除しますか？')){
      return false;
    }
    document.deleteform.submit();
  }
</script>
@endsection
