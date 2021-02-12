@extends('app')

@section('title','店舗情報一覧｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-content-lg">

    <h2 class="c-primary__heading"><span class="c-primary__heading__en">SHOP LIST</span>店舗情報一覧</h2>

    
    <div class="l-profile">
      <div class="l-profileContent">
        
        <ul class="c-list__block">

          @foreach ($shops as $shop)              
            <li class="c-list__block__item">
              <h2 class="c-list__block__heading">
                <a href="{{ route('shops.show',['shop'=>$shop]) }}" class="c-list__block__item__link">
                  {{ $shop->name }}
                </a>
              </h2>

              @if ( Auth::id() === $shop->user_id)
                <div class="c-list__block__content">
                  <form action="" method="post">
                    <button class="c-list__block__btn c-list__block__btn--delete" type="submit">削除</button>
                  </form>
                  <a href="{{ route('shops.edit',['shop'=>$shop]) }}" class="c-list__block__btn c-list__block__btn--edit">編集する</a>
                </div>

                <div class="p-modal">
                  <form action="{{ route('shops.destroy',['shop'=>$shop]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="p-modal__content">
                      <p class="p-modal__text">{{ $shop->name }}を削除します。よろしいですか？</p>
                    </div>
                    <div class="p-modal__btnWrap">
                      <button class="p-modal__btn p-modal__btn--cancel">キャンセル</button>
                      <button type="submit" class="p-modal__btn p-modal__btn--delete">削除する</button>
                    </div>
                  </form>
                </div>
              @endif
            </li>
          @endforeach
        </ul>

        
      </div>

      <aside class="l-side">
        <ul class="p-sideContent">
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <span class="material-icons">store</span>
                ラーメン屋を登録する
              </a>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <span class="material-icons">vpn_key</span>
                パスワード変更
              </a>
            </div>
          </li>
        </ul>
      </aside>
      
    </div>

  </div>

</main>

@endsection