@extends('app')

@section('title','マイページ｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="l-content-lg">
      
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">MY PAGE</span>マイページ</h2>
  
      <div class="l-profile">
  
        <div class="l-profileContent">
  
          <div class="c-profile">
            <div class="c-profile__img">
              @if (!empty($user->avatar))
                <img src="/storage/userImages/{{ $user->avatar }}" alt="image" class="">
              @else
                <img src="/images/noimage.jpg" alt="image" class="noimage">
              @endif
            </div>
            <div class="c-profile__content">
              <h2 class="c-profile__name">{{ $user->name }}</h2>
              <p class="c-profile__email">{{ $user->email }}</p>
            </div>
          </div>
  
          <div class="c-profileArchive">
            <div class="c-secondary__heading">投稿した口コミ</div>
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
    
            {{ $shops->links() }}
            
            <div class="l-cardWrap">
              @foreach($reviews as $review)
              <article class="c-card">
                <a href="{{ route('review.edit',['review'=>$review]) }}" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      @if (!empty($review->avatar))
                        <img src="/storage/reviewImages/{{ $review->image_path1 }}" alt="image" class="">
                      @else
                        <img src="/images/noimage.jpg" alt="image" class="noimage">
                      @endif
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
                        @else
                          <img src="/images/noimage.jpg" alt="image" class="noimage">
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
                      @else
                        <img src="/images/noimage.jpg" alt="image" class="noimage">
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
  
        @include('common.sidebar')
  
      </div>
  
    </div>
  </div>

  </main>

@endsection