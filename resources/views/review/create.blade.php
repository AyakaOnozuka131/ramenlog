@extends('app')

@section('title','クチコミ登録｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">
  <div class="l-content-lg">

    <h2 class="c-primary__heading"><span class="c-primary__heading__en">REVIEWS POSTED</span>口コミ投稿</h2>


    <div class="l-profile">
      <div class="l-profileContent">

        <form class="page-regist">
          <ul class="page-regist__block" action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            <li class="page-regist__item">
              <p class="page-regist__text">お店を選択</p>
              <div class="c-selectBox">
                <select name="お店" id="" class="">
                  <option value="">選択してください</option>
                  <option value="">ダミーダミーダミーダミーダミーダミーダミー</option>
                </select>
              </div>
            </li>
            <li class="page-regist__item">
              <p class="page-regist__text">評価</p>
              <div class="c-selectBox">
                <select name="score">
                  <option value="">選択してください</option>
                  <option value="1">★★★★★　1.0</option>
                  <option value="2">★★★★★　2.0</option>
                  <option value="3">★★★★★　3.0</option>
                  <option value="4">★★★★★　4.0</option>
                  <option value="5">★★★★★　5.0</option>
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
                    <input type="file" name="image_path1" class="c-img__inputFile">
                    <img src="" alt="" class="c-img__prevImg">
                    ドラッグ＆ドロップ<br>または<br>クリック
                    </div>
                  </label>
                </div>
                <div class="page-regist__item__rowBlock">
                  <p class="page-regist__text">画像2</p>
                  <label>
                    <div class="c-img__areaDrop">
                    <input type="file" name="image_path2" class="c-img__inputFile">
                    <img src="" alt="" class="c-img__prevImg">
                    ドラッグ＆ドロップ<br>または<br>クリック
                    </div>
                  </label>
                </div>
                <div class="page-regist__item__rowBlock">
                  <p class="page-regist__text">画像3</p>
                  <label>
                    <div class="c-img__areaDrop">
                    <input type="file" name="image_path3" class="c-img__inputFile">
                    <img src="" alt="" class="c-img__prevImg">
                    ドラッグ＆ドロップ<br>または<br>クリック
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

      <aside class="l-side">
        <ul class="p-sideContent">
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <span class="material-icons">message</span>
                口コミを投稿する
              </a>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <i class="material-icons">edit</i>
                プロフィールを編集する
              </a>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <span class="material-icons">vpn_key</span>
                パスワード変更
              </a>
            </div>
          </li>
          <li class="p-sideItem p-sideItem--profile">
            <div class="p-sideItem--profile__box">
              <a href="" class="p-sideItem--profile__link">
                <span class="material-icons">follow_the_signs</span>
                退会
              </a>
            </div>
          </li>
        </ul>
      </aside>
          
    </div>


  </div>


</main>

@endsection