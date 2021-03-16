@extends('app')

@section('title', 'パスワード再設定｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')


<main class="l-main">

    <div class="page-pass__remind">
      <div class="l-content-sm">
        <form action="{{ route('password.email') }}" method="post">
            @csrf
          <h2 class="c-primary__heading"><span class="c-primary__heading__en">RESET PASSWORD</span>パスワード再設定</h2>
          <p class="page-pass__remind__lead">
            パスワードを忘れてしまった場合、<br class="visible-sm">以下から再設定することが可能です。<br>登録時に使用したメールアドレスを入力してください。
          </p>
            @if (session('status'))
              <p class="">
                {{ session('status') }}
              </p>
            @endif
          <div class="p-form__content">
            <div class="c-form__item">
              <label for="email" class="c-label">Email</label>
              <input type="email" name="email" id="email" class="c-inputText">
            </div>
            <div class="p-form__btn">
              <button type="submit" class="c-primary__btn">送信する</button>
            </div>
            <div class="page-login__text"><a href="{{ route('users.show') }}" class="page-login__link">&lang;&lang;　マイページへ戻る</a></div>
        </div>
      </form>
      </div>
    </div>

  </main>

@endsection