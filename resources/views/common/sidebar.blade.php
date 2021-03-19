<aside class="l-side">
  <ul class="p-sideContent">
    <li class="p-sideItem p-sideItem--profile">
      <div class="p-sideItem--profile__box">
        <a href="{{ route('shops.create') }}" class="p-sideItem--profile__link">
          <span class="material-icons">store</span>
          ラーメン屋を登録する
        </a>
      </div>
    </li>
    <li class="p-sideItem p-sideItem--profile">
      <div class="p-sideItem--profile__box">
        <a href="{{ route('review.create') }}" class="p-sideItem--profile__link">
          <span class="material-icons">message</span>
          口コミを投稿する
        </a>
      </div>
    </li>
    <li class="p-sideItem p-sideItem--profile">
      <div class="p-sideItem--profile__box">
        <a href="{{ route('users.edit') }}" class="p-sideItem--profile__link">
          <i class="material-icons">edit</i>
          プロフィールを編集する
        </a>
      </div>
    </li>
    <li class="p-sideItem p-sideItem--profile">
      <div class="p-sideItem--profile__box">
        <a href="{{ route('password.request') }}" class="p-sideItem--profile__link">
          <span class="material-icons">vpn_key</span>
          パスワード変更
        </a>
      </div>
    </li>
    <li class="p-sideItem p-sideItem--profile">
      <div class="p-sideItem--profile__box">
        <a href="{{ route('deactive') }}" class="p-sideItem--profile__link">
          <span class="material-icons">follow_the_signs</span>
          退会
        </a>
      </div>
    </li>
  </ul>
</aside>