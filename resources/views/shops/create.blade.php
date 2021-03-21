@extends('app')

@section('title','店舗情報登録｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">
    <div class="l-content-lg">
  
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">SHOP REGIST</span>店舗情報登録</h2>
  
      
      <div class="l-profile">
        <div class="l-profileContent">
          
          @include('common.error_card_list')
  
          <form class="page-regist" action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
            @csrf
  
            <ul class="p-regist__block">
              <li class="page-regist__item">
                <p class="page-regist__text">店舗名を登録</p>
                <input type="text" name="name" value="{{ old('name') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">カテゴリーを登録</p>
                <div class="c-selectBox">
                  <select name="category_id" id="" class="">
                    @foreach($categories as $id=> $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">お店の説明</p>
                <textarea name="explanation" id="" cols="30" rows="10" class="c-textArea">{{ old('explanation') }}</textarea>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">住所</p>
                <input type="text" name="address" value="{{ old('address') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">電話番号</p>
                <input type="text" name="tel" id="" value="{{ old('tel') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">定休日</p>
                <input type="text" name="holiday" id="" value="{{ old('holiday') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">席数</p>
                <input type="text" name="seats" id="" value="{{ old('seats') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">交通手段</p>
                <input type="text" name="traffic" id="" value="{{ old('traffic') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">営業時間</p>
                <input type="text" name="business_hours" id="" value="{{ old('business_hours') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">駐車場情報</p>
                <input type="text" name="parking" id="" value="{{ old('parking') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">駐車場 GOOGLE MAP</p>
                <input type="text" name="parking_map" id="" value="{{ old('parking_map') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">駐車場（周辺）
                </p>
                <input type="text" name="parking2" id="" value="{{ old('parking2') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">駐車場（周辺） GOOGLE MAP</p>
                <input type="text" name="parking_map2" id="" value="{{ old('parking_map2') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">設備</p>
                <input type="text" name="facility" id="" value="{{ old('facility') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">その他・備考</p>
               <textarea name="other" id="" cols="30" rows="10" class="c-textArea">{{ old('other') }}</textarea>
              </li>
              <li class="page-regist__item">
                <div class="page-regist__item__row">
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像</p>
                    <label>
                      <div class="c-img__areaDrop">
                        <input type="file" name="image_path1" class="c-img__inputFile" accept="image/*" @change="onFileChange">
                        <div v-if="preview">
                          <img class="c-img__prevImg" :src="preview">
                        </div>
                        <div v-else>
                          <img class="c-img__prevImg">
                          ドラッグ＆ドロップ<br>または<br>クリック
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </li>
            </ul>
            <div class="p-form__btn">
              <button type="submit" class="c-primary__btn" value="">更新する</button>
            </div>
          </form>
  
        </div>
  
        @include('common.sidebar')
        
      </div>
  
    </div>
  </div>


</main>

@endsection