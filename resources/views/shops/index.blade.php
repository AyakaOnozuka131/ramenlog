@extends('app')

@section('title','店舗情報一覧｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="l-content-lg">
  
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">SHOP LIST</span>店舗情報一覧</h2>
  
      
      <div class="l-archive">
        <div class="l-archiveContent c-archiveContent">
          
          <div class="l-cardWrap">
            @foreach ($shops as $shop)
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
                      @foreach($categories as $id => $name)
                      @if($shop->category_id == $id)
                        {{ $name }}
                      @endif
                      @endforeach
                    </div>
                  </div>
                </a>
              </article>
            @endforeach

          </div>
          <div class="paginationWrap">
            <!-- ペジャーが入ります -->
          </div>
          
        </div>
  
        <aside class="l-side">
          <form action="{{ route('shops.index') }}" method="GET">
            <ul class="p-sideContent">
              <li class="p-sideItem p-sideItem--search">
                <p class="p-sideItem__heading">
                  <i class="material-icons">search</i>
                  検索
                </p>
                <div class="p-sideItem--search__keyword">
                  <input type="text" name="keyword" placeholder="キーワードで検索する">
                </div>
              </li>
              <li class="p-sideItem p-sideItem--search">
                <p class="p-sideItem__heading">
                  <span class="material-icons">done_all</span>
                  好みで探す
                </p>
                <div class="p-sideItem--search__select">
                  <div class="c-selectBox">
                    <select name="category_id">
                      @foreach($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </li>
              <li class="p-sideItem p-sideItem--btn">
                <button type="submit" class="c-primary__btn">検索する</button>
              </li>
            </ul>
          </form>
        </aside>
        
      </div>
  
    </div>
  </div>

</main>

@endsection