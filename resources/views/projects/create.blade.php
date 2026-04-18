<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>案件登録</title>
</head>
<body>

<h1>案件登録</h1>

@if ($customer)
  <p>顧客：{{ $customer->company_name }}</p>
@endif

@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li style="color:red;">{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('projects.store') }}">
  @csrf

  @if($customer)
    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
  @else
    <div>
      <label>顧客ID</label>
      <input type="number" name="customer_id" required>
    </div>
  @endif

  <div>
    <label>案件名（必須）</label><br>
    <input type="text" name="name" required>
  </div>

  <div>
    <label>ステータス</label><br>
    <input type="text" name="status" required>
  </div>

  <div>
    <label>金額</label><br>
    <input type="number" name="amount">
  </div>

  <div>
    <label>期限日</label><br>
    <input type="date" name="due_date">
  </div>

  <div>
    <label>メモ</label><br>
    <textarea name="note"></textarea>
  </div>

  <button type="submit">登録</button>
</form>

</body>
</html>