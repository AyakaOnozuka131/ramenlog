@extends('app')

@section('title','クチコミ更新｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">
    <div class="l-content-lg">
  
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">REVIEWS POSTED</span>口コミ投稿</h2>
  
  
      <div class="l-profile">
        <div class="l-profileContent">
  
          <form class="page-regist" action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <ul class="page-regist__block">
              <li class="page-regist__item">
                <p class="page-regist__text">お店を選択</p>
                <div class="c-selectBox">
                  <select name="shop_select" id="">
                    @foreach($shops as $id=> $name)
                    <option value="{{ $id }}"
                      @if($shop->shop_id == $id)
                      selected
                      @endif
                    >
                      {{ $name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">評価</p>
                <div class="c-selectBox">
                  <select name="score">
                    @foreach(config('score') as $key => $score)
                      <option value="{{ $key }}"
                      >
                      {{ $score }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">タイトル</p>
                <input type="text" name="title" value="{{ $review->title ?? old('title') }}" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">口コミ内容</p>
                <textarea name="contents" class="c-textArea">{{ $review->contents ?? old('contents') }}</textarea>
              </li>
              <li class="page-regist__item">
                <div class="page-regist__item__row">
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像1</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="file" name="image_path1" class="c-img__inputFile">
                      @if (!empty($review->image_path1))
                      <img src="/storage/reviewImages/{{ $review->image_path1 }}" alt="image" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                      @endif
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像1</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="file" name="image_path2" class="c-img__inputFile">
                      @if (!empty($review->image_path1))
                      <img src="/storage/reviewImages/{{ $review->image_path2 }}" alt="image" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                      @endif
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像1</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="file" name="image_path3" class="c-img__inputFile">
                      @if (!empty($review->image_path1))
                      <img src="/storage/reviewImages/{{ $review->image_path3 }}" alt="image" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                      @endif
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
    <div class="l-content-lg">

      <h2 class="c-primary__heading"><span class="c-primary__heading__en">REVIEWS POSTED</span>口コミ投稿</h2>

  
      <div class="l-profile">
        <div class="l-profileContent">
  
          <form class="page-regist">
            <ul class="page-regist__block" action="" method="post">
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
                  <select name="v" id="" class="">
                    <option value="">選択してください</option>
                    <option value="5.0">★★★★★　5.0</option>
                  </select>
                </div>
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">タイトル</p>
                <input type="text" name="username" value="" class="c-inputText">
              </li>
              <li class="page-regist__item">
                <p class="page-regist__text">口コミ内容</p>
                <textarea name="" id="" cols="" rows="" class="c-textArea"></textarea>
              </li>
              <li class="page-regist__item">
                <div class="page-regist__item__row">
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像1</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                      <input type="file" name="pic" class="c-img__inputFile">
                      <img src="" alt="" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像2</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                      <input type="file" name="pic" class="c-img__inputFile">
                      <img src="" alt="" class="c-img__prevImg">
                      ドラッグ＆ドロップ<br>または<br>クリック
                      </div>
                    </label>
                  </div>
                  <div class="page-regist__item__rowBlock">
                    <p class="page-regist__text">画像3</p>
                    <label>
                      <div class="c-img__areaDrop">
                      <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                      <input type="file" name="pic" class="c-img__inputFile">
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

    <div class="l-content-lg">
      
      <h2 class="c-primary__heading"><span class="c-primary__heading__en">MY PAGE</span>マイページ</h2>
  
      <div class="l-profile">
  
        <div class="l-profileContent">
  
          <div class="c-profile">
            <div class="c-profile__img"><img src="https://placehold.jp/300x300.png" alt=""></div>
            <div class="c-profile__content">
              <h2 class="c-profile__name">{{ $user->name }}</h2>
              <p class="c-profile__email">{{ $user->email }}</p>
            </div>
          </div>
  
          <div class="c-profileArchive">
            <div class="c-secondary__heading">投稿した口コミ</div>
            <div class="l-cardWrap">
              @foreach($reviews as $review)
              <article class="c-card">
                <a href="" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
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
          
          <div class="c-profileArchive">
            <div class="c-secondary__heading">お気に入りのお店</div>
            <div class="l-cardWrap">
              @foreach($shops as $shop)
              <article class="c-card">
                <a href="{{ route('shops.show',['shop'=>$shop]) }}" class="c-card__link">
                  <div class="l-card__imgWrap">
                    <div class="c-card__img">
                      <img src="https://placehold.jp/320x226.png" alt="">
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