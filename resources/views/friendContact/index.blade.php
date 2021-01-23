@extends('_layout/header')
@section('content')
<div class="container">
  <h3>コンタクトリスト</h3>

  <form id="search_form" action="{{ route("friendContact.index")}}" method="GET">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label>内容</label>
        <input type="text" name="detail" class="form-control" value="{{ $detail }}">
      </div>
    </div>
    <input type="button" class="btn btn-secondary clear-btn" value="クリア" onclick="showAlert();">  
    <input type="submit" class="btn btn-primary" value="検索">
  </form>

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
        <form action="{{ route('friendContact.edit', [$contact->id, 'contact']) }}">
          <button type="submit" class="btn btn-primary">編集</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection