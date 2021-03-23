@extends('app')

@section('title', 'パスワード再設定入力｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="page-pass__remind">
      <div class="l-content-sm">
        <form action="{{ route('password.update') }}" method="post">
            @csrf
          <h2 class="c-primary__heading"><span class="c-primary__heading__en">RESET PASSWORD</span>パスワードの再設定</h2>
          <div class="p-form__content">
            <div class="c-form__item">

              <input type="hidden" name="email" value="{{ $email }}">
              <input type="hidden" name="token" value="{{ $token }}">

              <label for="password" class="c-label">新しいパスワード</label>
              <input type="password" name="password" class="c-inputText" required>
            </div>
            <div class="c-form__item">
                <label for="password" class="c-label">新しいパスワード(再入力)</label>
                <input type="password" name="password_confirmation" class="c-inputText" required>
            </div>
            <div class="p-form__btn">
              <button type="submit" class="c-primary__btn" value="">再発行する</button>
            </div>
            <div class="page-login__text"><a href="{{ route('password.request') }}" class="page-login__link">パスワード再発行メールを再度送信する　&rang;&rang;</a></div>
        </div>
      </form>
      </div>
    </div>
  </div>

  </main>

@endsection