@extends('_layout/header')
@section('content')
<div class="container">
  <h3>進捗一覧</h3>

  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <table class="table">
        <tr>
          <th>日付</th>
          <th>内容</th>
          <th>編集</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->contact_date }}</td>
          <td>{{ $contact->detail }}</td>
          <td>
            <form action="{{ route('friendContact.edit', ['id' => $contact->id]) }}">
              <button type="submit" class="btn btn-primary">編集</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection