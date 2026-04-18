<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>顧客一覧</title>
</head>

<body>
  <h1>顧客一覧</h1>
  <form method="GET" action="{{ route('customers.index') }}">
    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="会社名で検索">
    <button type="submit">検索</button>
    <a href="{{ route('customers.index') }}">クリア</a>
  </form>
  @if(session('success'))
  <p style="color:green;">{{ session('success') }}</p>
  @endif

  <p><a href="{{ route('customers.create') }}">+ 新規顧客</a></p>

  @if($customers->isEmpty())
  <p>顧客がまだ登録されていません。</p>
  @else
  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>会社名</th>
        <th>担当者</th>
        <th>メール</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customers as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td><a href="{{ route('customers.show', $c) }}">{{ $c->company_name }}</a></td>
        <td>{{ $c->contact_person }}</td>
        <td>{{ $c->email }}</td>
        <td>
          <a href="{{ route('customers.edit', $c) }}">編集</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</body>

</html>