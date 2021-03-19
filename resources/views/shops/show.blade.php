@extends('app')

@section('title',$shop->name.'の店舗詳細情報｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

  <main class="l-main">

    <div class="l-page">
      <div class="page-shop">
        
        <div class="p-shop__head">
          <div class="l-content-sm">
            <div class="p-shop__headInner">
              <div class="p-shop__head__img">
                @if (!empty($shop->image_path1))
                <img src="/storage/shopImages/{{ $shop->image_path1 }}" alt="image">
                @endif
              </div>
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
                      {{ $shop->explanation }}
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
                  <tr>
                    <th class="c-table__head">定休日</th>
                    <td class="c-table__content">
                      {{ $shop->holiday }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">席数</th>
                    <td class="c-table__content">
                      {{ $shop->seats }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">交通手段</th>
                    <td class="c-table__content">
                      {{ $shop->traffic }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">営業時間</th>
                    <td class="c-table__content">
                      {{ $shop->business_hours }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">駐車場情報</th>
                    <td class="c-table__content">
                      {{ $shop->parking }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">駐車場 GOOGLE MAP</th>
                    <td class="c-table__content">
                      {{ $shop->parking_map }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">駐車場（周辺）</th>
                    <td class="c-table__content">
                      {{ $shop->parking2 }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">駐車場（周辺） GOOGLE MAP</th>
                    <td class="c-table__content">
                      {{ $shop->parking_map2 }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">設備</th>
                    <td class="c-table__content">
                      {{ $shop->facility }} 
                    </td>
                  </tr>
                  <tr>
                    <th class="c-table__head">その他・備考</th>
                    <td class="c-table__content">
                      {{ $shop->other }} 
                    </td>
                  </tr>
                </tr>
                </table>
              </div>
            </div>
            <div class="p-shop__tabInner p-shop__tabInner--review">
              @foreach($reviews as $review)
              <div class="c-review">
                <div class="c-review__head">
                  <div class="c-review__userIcon">
                    @if (!empty($user->avatar))
                      <img src="/storage/userImages/{{ $user->avatar }}" alt="image" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                    @endif
                  </div>
                  <div class="c-review__head__content">
                    <p class="c-review__userName">{{ $user->name }}</p>
                    <div class="c-review__score">
                      @foreach(config('score') as $key => $score)
                        @if($review->score == $key)
                          {{ $score }}
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="c-review__body">
                  <p class="c-review__text">
                    {{ $review->contents }}
                  </p>
                  <div class="c-review__photo">
                    <div class="c-review__photo__img">
                      @if (!empty($review->image_path1))
                      <img src="/storage/reviewImages/{{ $review->image_path1 }}" alt="image">
                      @endif
                    </div>
                    <div class="c-review__photo__img">
                      @if (!empty($review->image_path2))
                      <img src="/storage/reviewImages/{{ $review->image_path2 }}" alt="image">
                      @endif
                    </div>
                    <div class="c-review__photo__img">
                      @if (!empty($review->image_path3))
                      <img src="/storage/reviewImages/{{ $review->image_path3 }}" alt="image">
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
  
      </div>
    </div>

  </main>

@endsection