@extends('app')

@section('title', 'ログイン｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="page-login">
      <div class="l-content-sm">
        
        <form action="{{ route('login') }}" method="post">
          @csrf
          <h2 class="c-primary__heading"><span class="c-primary__heading__en">LOGIN</span>ログイン</h2>
  
          @include('common.error_card_list')
  
          <div class="p-form__content">
            <div class="c-form__item">
              <label for="email" class="c-label">メールアドレス</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="c-inputText" required>
            </div>
            <div class="c-form__item">
              <label for="password" class="">パスワード</label>
              <input type="password" name="password" class="c-inputText" required>
            </div>
            <div class="c-form__item">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember" class="c-checkbox">次回ログインを省略する</label>
            </div>
          </div>
          <div class="p-form__btn">
            <button type="submit" class="c-primary__btn">登録する</button>
          </div>
          <div class="page-login__text"><a href="{{ route('password.request') }}" class="page-login__link">パスワードをお忘れの方はこちら　&rang;&rang;</a></div>
        </div>
      </form>
      </div>
    </div>
  </div>

</main>



@endsection