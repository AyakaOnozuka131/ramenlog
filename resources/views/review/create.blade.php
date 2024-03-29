@extends('app')

@section('title','クチコミ登録｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="l-page">

    <div class="l-content-lg">
  
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">REVIEWS POSTED</span>口コミ投稿</h2>
  
  
      <div class="l-profile">
        <div class="l-profileContent">
  
          <form class="page-regist" action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('common.error_card_list')
            
            <ul class="page-regist__block">
              <li class="page-regist__item">
                <p class="page-regist__text">お店を選択</p>
                <div class="c-selectBox">
                  <select name="shop_select" id="">
                    @foreach($shops as $id=> $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">評価</p>
                <div class="c-selectBox">
                  <select name="score">
                    @foreach(config('score') as $key => $score)
                      <option value="{{ $key }}">{{ $score }}</option>
                    @endforeach
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">タイトル</p>
                <input type="text" name="title" value="{{ old('title') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">口コミ内容</p>
                <textarea name="contents" class="c-textArea">{{ old('contents') }}</textarea>
              </li>
              <li class="page-regist__item">
                <div class="page-regist__item__row">
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像1</p>
                    <label>
                      <div class="c-img__areaDrop">
                        <input type="file" name="image_path1" id="image_path1" class="c-img__inputFile" accept="image/*" @change="onFileChange">
                        <div v-if="preview1">
                          <img class="c-img__prevImg" :src="preview1">
                        </div>
                        <div v-else>
                          <img class="c-img__prevImg">
                          ドラッグ＆ドロップ<br>または<br>クリック
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像2</p>
                    <label>
                      <div class="c-img__areaDrop">
                        <input type="file" name="image_path2" id="image_path2" class="c-img__inputFile" accept="image/*" @change="onFileChange">
                        <div v-if="preview2">
                          <img class="c-img__prevImg" :src="preview2">
                        </div>
                        <div v-else>
                          <img class="c-img__prevImg">
                          ドラッグ＆ドロップ<br>または<br>クリック
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像3</p>
                    <label>
                      <div class="c-img__areaDrop">
                        <input type="file" name="image_path3" id="image_path3" class="c-img__inputFile" accept="image/*" @change="onFileChange">
                        <div v-if="preview3">
                          <img class="c-img__prevImg" :src="preview3">
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
              <button type="submit" class="c-primary__btn" value="">登録する</button>
            </div>
          </form>
  
        </div>
  
        @include('common.sidebar')
            
      </div>
  
  
    </div>

  </div>

</main>

@endsection