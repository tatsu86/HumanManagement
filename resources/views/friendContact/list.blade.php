<table class="table table-hover">
  <thead>
    <tr>
      <th style="width:8rem;">日付</th>
      <th>内容</th>
      <th style="width:5rem;">編集</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contacts as $contact)
    <tr>
      <td style="width:8rem;">{{ $contact->contact_date }}</td>
      <td>{{ $contact->detail }}</td>
      <td style="width:5rem;">
        <form action="{{ route("friendContact.edit", [$contact->id, 'friend']) }}">
          <button type="submit" class="btn btn-primary">編集</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>