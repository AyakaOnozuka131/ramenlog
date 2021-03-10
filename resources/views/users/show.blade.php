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
                <a href="{{ route('review.edit',['review'=>$review]) }}" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
                    </div>
                  </div>
                  <div class="c-card__content">
                    <h3 class="c-card__title">{{ $review->title }}</h3>
                    <p class="c-card__text">{{ $review->contents }}</p>
                  </div>
                </a>
              </article>
              @endforeach
          </div>

          <div class="c-profileArchive">
            <div class="c-secondary__heading">登録したお店</div>
            <div class="l-cardWrap">
              @foreach($registShops as $registShop)
                <article class="c-card">
                  <a href="{{ route('shops.show',['shop'=>$registShop]) }}" class="c-card__link">
                    <div class="l-card__imgWrap">
                      <div class="c-card__img">
                        @if (!empty($registShop->image_path1))
                        <img src="/storage/shopImages/{{ $registShop->image_path1 }}" alt="image">
                        @endif
                      </div>
                    </div>
                    <div class="c-card__content">
                      <h3 class="c-card__title">{{ $registShop->name }}</h3>
                      <p class="c-card__text">{{ $registShop->explanation }}</p>
                      <div class="c-card__catWrap">
                        <p class="c-card__cat">
                          @foreach($categories as $id => $name)
                            @if($registShop->category_id == $id)
                            {{ $name }}
                            @endif
                          @endforeach
                        </p>
                      </div>
                    </div>
                  </a>
                </article>
                @endforeach
            </div>
          </div>
          
          <div class="c-profileArchive">
            <div class="c-secondary__heading">お気に入りのお店</div>
            <div class="l-cardWrap">
              @foreach($shops as $shop)
              <article class="c-card">
                <a href="{{ route('shops.show',['shop'=>$shop]) }}" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      @if (!empty($shop->image_path1))
                      <img src="/storage/shopImages/{{ $shop->image_path1 }}" alt="image">
                      @endif
                    </div>
                  </div>
                  <div class="c-card__content">
                    <h3 class="c-card__title">{{ $shop->name }}</h3>
                    <p class="c-card__text">{{ $shop->explanation }}</p>
                    <div class="c-card__catWrap">
                      <p class="c-card__cat">
                        @foreach($categories as $id => $name)
                          @if($shop->category_id == $id)
                          {{ $name }}
                          @endif
                        @endforeach
                      </p>
                    </div>
                  </div>
                </a>
              </article>
              @endforeach
            </div>
          </div>
        </div>
  
  
        @include('users.sidebar')
  
      </div>

    </div>

  </main>

@endsection