<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table">
      <tr>
        <th>日付</th>
        <th>内容</th>
      </tr>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->contact_date }}</td>
        <td>{{ $contact->detail }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>