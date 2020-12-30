@extends('_layout/header')
@section('content')
<div class="container">
  <h3>進捗一覧</h3>
  <table class="table table-hover">
    <tr>
      <th style="width:8rem;">日付</th>
      <th>内容</th>
      <th style="width:5rem;">編集</th>
    </tr>
    @foreach($contacts as $contact)
    <tr>
      <td style="width:8rem;">{{ $contact->contact_date }}</td>
      <td>{{ $contact->detail }}</td>
      <td style="width:5rem;">
        <form action="{{ route('friendContact.edit', ['id' => $contact->id]) }}">
          <button type="submit" class="btn btn-primary">編集</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection