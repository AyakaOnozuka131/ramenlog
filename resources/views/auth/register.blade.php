@extends('app')

@section('title', 'ユーザー登録｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="page-login">
      <div class="l-content-sm">
        
        <form action="{{ route('register') }}" method="post">
          @csrf
          <h2 class="c-primary__heading"><span class="c-primary__heading__en">REGISTRATION</span>ユーザー登録</h2>
  
          @include('common.error_card_list')
  
          <div class="p-form__content">
            <div class="c-form__item">
              <label for="username" class="c-label">ユーザー名</label>
              <input type="text" name="name" value="{{ old('name') }}" id="username" class="c-inputText" required>
            </div>
            <div class="c-form__item">
              <label for="email" class="c-label">メールアドレス</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="c-inputText" required>
            </div>
            <div class="c-form__item">
              <label for="password" class="">パスワード</label>
              <input type="password" name="password" class="c-inputText" required>
            </div>
            <div class="c-form__item">
              <label for="password_confirmation" class="">パスワード（確認）</label>
              <input type="password" name="password_confirmation" class="c-inputText" required>
            </div>
          </div>
            <div class="p-form__btn">
              <button type="submit" class="c-primary__btn">登録する</button>
            </div>
            <div class="page-login__text"><a href="" class="page-login__link">パスワードをお忘れの方はこちら　&rang;&rang;</a></div>
        </div>
      </form>
      </div>
    </div>
  </div>

</main>



@endsection