@extends('_layout/header')
@section('content')
<div class="container">
  <h3>コンタクト分析</h3>

  {{-- TODO:コンタクト数が多いベスト3を表示する --}}
  @foreach($contacts as $contact)
    <h3>{{ $loop->index + 1 }}位　{{ $contact->name }} {{ $contact->contact_count }}回</h3>
  @endforeach

</div>
@endsection