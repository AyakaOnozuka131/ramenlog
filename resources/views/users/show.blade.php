@extends('app')

@section('title','マイページ｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

    <div class="l-content-lg">
      
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">MY PAGE</span>マイページ</h2>
  
      <div class="l-profile">
  
        <div class="l-profileContent">
  
          <div class="c-profile">
            <div class="c-profile__img"><img src="https://placehold.jp/300x300.png" alt=""></div>
            <div class="c-profile__content">
              <h2 class="c-profile__name">{{ $user->name }}</h2>
              <p class="c-profile__email">{{ $user->email }}</p>
            </div>
          </div>
  
          <div class="c-profileArchive">
            <div class="c-secondary__heading">投稿した口コミ</div>
            <div class="l-cardWrap">
              @foreach($reviews as $review)
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <h3 class="c-card__title">{{ $review->title }}</h3>
                    <p class="c-card__text">{{ $review->contents }}</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              @endforeach
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
            </div>
            <div class="p-profileArchive__btn">
              <a href="" class="c-primary__btn">一覧を見る</a>
            </div>
  
          </div>
          
          <div class="c-profileArchive">
            <div class="c-secondary__heading">お気に入りのお店</div>
            <div class="l-cardWrap">
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
              <article class="c-card">
                <a href="http://" target="_blank" rel="noopener noreferrer" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <p class="c-card__area">高崎市</p>
                    <h3 class="c-card__title">ダミーダミーダミーダミーダミー</h3>
                    <p class="c-card__text">ダミーダミーダミーダミーダミーダミー</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">醤油ラーメン</p>
                      <p class="c-card__cat">醤油ラーメン</p>
                    </div>
                  </div>
                </a>
              </article>
            </div>
            <div class="p-profileArchive__btn">
              <a href="" class="c-primary__btn">一覧を見る</a>
            </div>
          </div>
        </div>
  
  
        <aside class="l-side">
          <ul class="p-sideContent">
            <li class="p-sideItem p-sideItem--profile">
              <div class="p-sideItem--profile__box">
                <a href="" class="p-sideItem--profile__link">
                  <span class="material-icons">message</span>
                  口コミを投稿する
                </a>
              </div>
            </li>
            <li class="p-sideItem p-sideItem--profile">
              <div class="p-sideItem--profile__box">
                <a href="" class="p-sideItem--profile__link">
                  <i class="material-icons">edit</i>
                  プロフィールを編集する
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
            <li class="p-sideItem p-sideItem--profile">
              <div class="p-sideItem--profile__box">
                <a href="" class="p-sideItem--profile__link">
                  <span class="material-icons">follow_the_signs</span>
                  退会
                </a>
              </div>
            </li>
          </ul>
        </aside>
  
      </div>

    </div>


  </main>

@endsection