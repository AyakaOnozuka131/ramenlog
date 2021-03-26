@extends('app')

@section('title','ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')
<main class="l-main">
  <div class="page-searchArea">
    <div class="l-content-md">
      <div class="page-searchContent">
        <h2 class="page-searchArea__heading"><span class="en">SEARCH</span>検索</h2>
        <div class="page-searchForm">
          <form action="{{ route('shops.index') }}" method="GET">
            <div class="page-searchForm__keyword">
              <input type="text" name="keyword" placeholder="キーワードで検索する">
            </div>
            <ul class="page-searchForm__category">
              <li class="page-searchForm__category__item">
                <p class="page-searchForm__category__text">好みで探す</p>
                <div class="page-searchForm__category__select c-selectBox">
                  <select name="category_id">
                    @foreach($categories as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                  </select>
                </div>
              </li>
            </ul>
            <div class="page-searchForm__btn">
              <button type="submit" class="c-primary__btn">検索する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <section class="page-new">
    <div class="l-content-lg">
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">NEW</span>新着情報</h2>
      <div class="l-cardWrap l-cardWrap--col4">

        @foreach ($shops as $shop)
          <article class="c-card">
            <a href="{{ route('shops.show',['shop'=>$shop]) }}" target="_blank" rel="noopener noreferrer" class="c-card__link">
              <div class="l-card__imgWrap">
                <div class="c-card__img">
                  @if (!empty($shop->image_path1))
                    <img src="{{ $shop->image_path1 }}" alt="image">
                  @else
                    <img src="/images/noimage.jpg" alt="image" class="noimage">
                  @endif
                </div>
              </div>
              <div class="c-card__content">
                <h3 class="c-card__title">{{ $shop->name }}</h3>
                <p class="c-card__text">
                  {{ $shop->explanation }}
                </p>
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
      <div class="page-new__btnWrap">
        <a href="{{ route('shops.index') }}" class="c-primary__btn">一覧を見る</a>
      </div>
    </div>
  </section>


    <section class="page-support">
      <div class="l-content-lg">
        <div class="page-support__head">
          <h2 class="c-primary__heading"><span class="c-primary__heading__en">SUPPORT</span>ラーメンログでできること</h2>  
          <p class="page-support__lead">
            ラーメンログは、群馬県に特化した、美味しいラーメン屋の情報・口コミ情報を紹介するサイトです。<br>
            いま話題のラーメン店をレビューや写真で見つけよう！
          </p>
        </div>
        
        <div class="page-support__search">
          <div class="c-searchContent">
            <h2 class="c-secondary__heading">好みで探す</h2>
            <ul class="c-searchContent__list">
              @foreach($categories as $id => $name)
              <li class="c-searchContent__item">
                <a href="{{ route('shops.index', 'category_id='.$id ) }}" class="c-searchContent__link">{{ $name }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection