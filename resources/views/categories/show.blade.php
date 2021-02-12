@extends('app')

@section('title',$category->name)

@section('content')

<main class="l-main">
  <div class="l-content-lg">
    
    <h2 class="c-primary__heading"><span class="c-primary__heading__en">SHOP</span>群馬県のラーメン屋一覧</h2>

    <div class="l-archive">
      <div class="l-archiveContent c-archiveContent">
        <div class="page-category__headingWrap">
          <h3 class="c-category__heading">
            {{ $category->name }}一覧
          </h3>
        </div>
        <div class="l-cardWrap">
          @foreach ($category->shops as $shop)
          <article class="c-card">
            <a href="{{ route('shops.show',['shop'=>$shop]) }}" class="c-card__link">
              <div class="l-card__imgWrap">
                <div class="c-card__img">
                  <img src="https://placehold.jp/320x226.png" alt="">
                </div>
              </div>
              <div class="c-card__content">
                <h3 class="c-card__title">{{ $shop->name }}</h3>
                <p class="c-card__text">
                  {{ $shop->explanation }}
                </p>
                <div class="c-card__catWrap">
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
        <ul class="p-sideContent">
          <li class="p-sideItem p-sideItem--search">
            <p class="p-sideItem__heading">
              <i class="material-icons">search</i>
              検索
            </p>
            <div class="p-sideItem--search__keyword">
              <input type="text" name="検索" id="" placeholder="キーワードで検索する">
            </div>
          </li>
          <li class="p-sideItem p-sideItem--search">
            <p class="p-sideItem__heading">
              <i class="material-icons">place</i>
              エリアで探す
            </p>
            <div class="p-sideItem--search__select">
              <div class="c-selectBox">
                <select name="area">
                  <optgroup label="北毛地方">
                    <option value="前橋">前橋</option>
                    <option value="高崎">高崎</option>
                    <option value="伊勢崎">伊勢崎</option>
                  </optgroup>
                </select>
              </div>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--search">
            <p class="p-sideItem__heading">
              <span class="material-icons">done_all</span>
              好みで探す
            </p>
            <div class="p-sideItem--search__select">
              <div class="c-selectBox">
                <select name="category">
                  <optgroup label="あっさり系">
                    <option value="醤油ラーメン">醤油ラーメン</option>
                    <option value="塩ラーメン">塩ラーメン</option>
                  </optgroup>
                  <optgroup label="こってり系">
                    <option value="豚骨ラーメン">豚骨ラーメン</option>
                    <option value="二郎系">二郎系</option>
                    <option value="家系ラーメン">家系ラーメン</option>
                  </optgroup>
                </select>
              </div>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--btn">
            <button type="submit" class="c-primary__btn">検索する</button>
          </li>
        </ul>
      </aside>
    </div>


  </div>
</main>

@endsection