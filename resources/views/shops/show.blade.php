@extends('app')

@section('title','店舗情報詳細｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

  <main class="l-main">

    <div class="page-shop">
      
      <div class="p-shop__head">
        <div class="l-content-sm">
          <div class="p-shop__headInner">
            <div class="p-shop__head__img"><img src="https://placehold.jp/300x300.png" alt=""></div>
            <div class="p-shop__head__content">
              <div class="p-shop__head__contentHead">
                <h2 class="c-shop__head__heading">
                  {{ $shop->name }}
                </h2>
              </div>
              <p class="p-shop__head__text">
                {{ $shop->explanation }}
              </p>

              <shop-like
                :initial-is-liked-by='@json($shop->isLikedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('shops.like', ['shop' => $shop->id]) }}"
              >
              </shop-like>
              
            </div>
          </div>
        </div>
      </div>

      <div class="p-shop__tabs">
        <div class="l-content-sm">
          <div class="p-shop__tabs__inner">
            <button class="c-shop__tab is-current">お店の情報</button>
            <button class="c-shop__tab ">口コミ</button>
          </div>
        </div>
      </div>

      <div class="p-shop__tabContent">
        <div class="l-content-sm">
          <div class="p-shop__tabInner p-shop__tabInner--info is-active">
            <div class="c-tableWrap">
              <table class="c-table">
                <tr>
                <th class="c-table__head">お店の説明</th>
                  <td class="c-table__content">
                    {{ $shop->address }}
                  </td>
                </tr>
                <tr>
                  <th class="c-table__head">住所</th>
                  <td class="c-table__content">
                    {{ $shop->address }}
                  </td>
                </tr>
                <tr>
                  <th class="c-table__head">電話番号</th>
                  <td class="c-table__content">
                    {{ $shop->tel }} 
                  </td>
                </tr>
              </tr>
              </table>
            </div>
          </div>
          <div class="p-shop__tabInner p-shop__tabInner--review">
            <div class="c-review">
              <div class="c-review__head">
                <div class="c-review__userIcon"><img src="https://placehold.jp/300x300.png" alt="アイコン"></div>
                <div class="c-review__head__content">
                  <p class="c-review__userName">〇〇さん</p>
                  <div class="c-review__score">
                    ★★★★★★
                  </div>
                </div>
              </div>
              <div class="c-review__body">
                <p class="c-review__text">
                  ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー
                </p>
                <div class="c-review__photo">
                  <div class="c-review__photo__img"><img src="https://placehold.jp/300x200.png" alt=""></div>
                  <div class="c-review__photo__img"><img src="https://placehold.jp/300x200.png" alt=""></div>
                  <div class="c-review__photo__img"><img src="https://placehold.jp/300x200.png" alt=""></div>
                  <div class="c-review__photo__img"><img src="https://placehold.jp/300x200.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </main>

@endsection