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
                <img src="{{ $user->avatar }}" alt="image" class="">
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
  
              @foreach ($reviews as $review)              
                <li class="c-list__block__item">
                  <h2 class="c-list__block__heading">
                    {{ $review->title }}
                  </h2>
    
                  <div class="c-list__block__content">
                    <button class="c-list__block__btn c-list__block__btn--delete" type="button" @click="reviewmModalId = '@json($review->id)'">
                      <span class="material-icons">delete</span>
                      削除
                    </button>
                    <a href="{{ route('review.edit',['review'=>$review]) }}" class="c-list__block__btn c-list__block__btn--edit">
                      <span class="material-icons">edit</span>
                      編集
                    </a>
                  </div>
  
                  <div class="c-modal" v-show="reviewmModalId === '@json($review->id)'">
                    <div class="c-modal__bg"></div>
                    <form action="{{ route('review.destroy',['review'=>$review]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <div class="c-modal__content">
                        <p class="c-modal__text">{{ $review->title }}を削除します。よろしいですか？</p>
                        <div class="c-modal__btnWrap">
                          <button type="button" class="c-modal__btn c-modal__btn--cancel" @click="reviewCloseModal">キャンセル</button>
                          <button type="submit" class="c-modal__btn c-modal__btn--delete">削除する</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
              @endforeach
            </ul>    
            
          </div>
  
          <div class="c-profileArchive">
            <div class="c-secondary__heading">登録したお店</div>
              <ul class="c-list__block">
                @foreach($registShops as $registShop)
                <li class="c-list__block__item">
                  <h2 class="c-list__block__heading">
                    <a href="{{ route('shops.show',['shop'=>$registShop]) }}">
                      {{ $registShop->name }}
                    </a>
                  </h2>
    
                  <div class="c-list__block__content">
                    <button class="c-list__block__btn c-list__block__btn--delete" type="button" @click="shopModalId = '@json($registShop->id)'">
                      <span class="material-icons">delete</span>
                      削除
                    </button>
                    <a href="{{ route('shops.edit',['shop'=>$registShop]) }}" class="c-list__block__btn c-list__block__btn--edit">
                      <span class="material-icons">edit</span>
                      編集
                    </a>
                  </div>

                  <div class="c-modal" v-show="shopModalId === '@json($registShop->id)'">
                    <div class="c-modal__bg"></div>
                    <form action="{{ route('shops.destroy',['shop'=>$registShop]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <div class="c-modal__content">
                        <p class="c-modal__text">{{ $registShop->name }}を削除します。よろしいですか？</p>
                        <div class="c-modal__btnWrap">
                          <button type="button" class="c-modal__btn c-modal__btn--cancel" @click="shopCloseModal">キャンセル</button>
                          <button type="submit" class="c-modal__btn c-modal__btn--delete">削除する</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
                @endforeach
              </ul>
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