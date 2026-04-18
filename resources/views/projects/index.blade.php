<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>案件一覧</title>
</head>
<body>

<h1>案件一覧</h1>

<form method="GET" action="{{ route('projects.index') }}">
  <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="案件名で検索">

  <select name="status">
    <option value="">ステータス（全て）</option>
    @foreach($statuses as $s)
      <option value="{{ $s }}" @selected(($status ?? '') === $s)>{{ $s }}</option>
    @endforeach
  </select>

  <button type="submit">検索</button>
  <a href="{{ route('projects.index') }}">クリア</a>
</form>

<hr>

@if($projects->isEmpty())
  <p>案件がありません。</p>
@else
  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>案件名</th>
        <th>顧客</th>
        <th>ステータス</th>
        <th>期限日</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->name }}</td>
          <td>
            <a href="{{ route('customers.show', $p->customer) }}">
              {{ $p->customer->company_name }}
            </a>
          </td>
          <td>{{ $p->status }}</td>
          <td>{{ $p->due_date ?? '—' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif

</body>
</html>