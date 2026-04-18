<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>顧客登録</title>
</head>

<body>
  <h1>顧客登録</h1>

  <p><a href="{{ route('customers.index') }}">← 一覧へ戻る</a></p>

  @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
    <li style="color:red;">{{ $error }}</li>
    @endforeach
  </ul>
  @endif

  <form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div>
      <label>会社名（必須）</label><br>
      <input type="text" name="company_name" value="{{ old('company_name') }}" required>
    </div>

    <div>
      <label>担当者</label><br>
      <input type="text" name="contact_person" value="{{ old('contact_person') }}">
    </div>

    <div>
      <label>電話</label><br>
      <input type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <div>
      <label>メール</label><br>
      <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
      <label>メモ</label><br>
      <textarea name="note" rows="4" cols="40">{{ old('note') }}</textarea>
    </div>

    <button type="submit">登録</button>
  </form>
</body>

</html>