<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>顧客詳細</title>
</head>

<body>
  <p><a href="{{ route('customers.index') }}">← 顧客一覧へ</a></p>

  <h1>顧客詳細</h1>

  <h2>{{ $customer->company_name }}</h2>

  <ul>
    <li>担当者：{{ $customer->contact_person ?? '—' }}</li>
    <li>電話：{{ $customer->phone ?? '—' }}</li>
    <li>メール：{{ $customer->email ?? '—' }}</li>
  </ul>

  <h3>メモ</h3>
  <p>{{ $customer->note ?? '—' }}</p>

  <hr>
  <p>
    <a href="{{ route('projects.create', ['customer_id' => $customer->id]) }}">
      + この顧客の案件を追加
    </a>
  </p>
  <h2>案件一覧（この顧客）</h2>

  <p>
    <a href="{{ route('customers.projects.index', $customer) }}">この顧客の案件一覧ページへ</a>
  </p>

  @if($customer->projects->isEmpty())
  <p>案件はまだありません。</p>
  @else
  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>案件名</th>
        <th>ステータス</th>
        <th>期限日</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customer->projects as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->status }}</td>
        <td>{{ $p->due_date ?? '—' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</body>

</html>