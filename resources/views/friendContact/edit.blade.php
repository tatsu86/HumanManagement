@extends('_layout/header')
@section('content')
<div class="container">
  <h3>連絡登録フォーム</h3>

  @include('friendContact/_form', ['target' => 'update'])

</div>
@endsection