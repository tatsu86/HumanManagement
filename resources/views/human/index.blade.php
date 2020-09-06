@extends('_layout/header')
@section('content')
<h1>Human List</h1>

<div>
  <table class="table text-center">
    <tr>
      <th>ID</th>
      <th>性</th>
      <th>名</th>
      <th>特徴</th>
    </tr>
    @foreach($humans as $human)
    <tr>
      <td>
        <a href="/human/{{ $human->id }}/edit">{{ $human->id }}</a>
      </td>
      <td>{{ $human->last_name }}</td>
      <td>{{ $human->first_name }}</td>
      <td>{{ $human->feature }}</td>
    </tr>
    @endforeach
    <div>
      <a href="/human/create" class="btn btn-default">新規登録</a>
    </div>

  </table>
</div>
@endsection