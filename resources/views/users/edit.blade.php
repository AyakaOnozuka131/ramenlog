@extends('app')

@section('title','プロフィール編集｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="l-content-lg">
  
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">MY PAGE</span>マイページ</h2>
  
      <div class="l-profile">
        <div class="l-profileContent">
  
          <form class="page-profileChange" action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            @include('common.error_card_list')
  
            <ul class="page-profileChange__block">
              <li class="page-profileChange__item">
                <p class="page-profileChange__text">プロフィール画像</p>
                <label>
                  <div class="c-img__areaDrop">
                  <input type="file" class="c-img__inputFile" name="avatar">
                    @if (!empty($user->avatar))
                      <img src="/storage/userImages/{{ $user->avatar }}" alt="image" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                    @endif
                  </div>
                </label>
              </li>
              <li class="page-profileChange__item">
                <p class="page-profileChange__text">名前</p>
                <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="c-inputText">
              </li>
              <li class="page-profileChange__item">
                <p class="page-profileChange__text">Email</p>
                <input type="email" name="email" value="{{ $user->email ?? old('email') }}" class="c-inputText">
              </li>
            </ul>
            <div class="p-form__btn">
              <button type="submit" class="c-primary__btn" value="">登録する</button>
            </div>
            
          </form>
          
        </div>
  
        @include('common.sidebar')
  
      </div>
  
    </div>
  </div>

</main>


@endsection