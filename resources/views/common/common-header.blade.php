<header class="c-header" :class="{ 'is-open':isOpen }">
  <button @click="drawer" type="button" id="js-buttonHamburger" class="c-hamButton c-hamburger" aria-controls="global-nav" :aria-expanded="isActive ? 'true' : 'false'" :class="{ 'is-drawerActive':isActive }">
    <span class="c-hamburger__line">
      <span class="u-visuallyHidden">
        メニューを開閉する
      </span>
    </span>
  </button>
  <div class="l-header l-content-lg">
    <h1 class="logo"><a href="/" class="logo__link">ラーメンログ</a></h1>
    <nav class="c-header__content">
      <ul class="c-header__head__list">
        <li class="c-header__head__item">
          @guest
            <a href="{{ route('login') }}" class="c-header__head__item__link">ログイン</a>
          @endguest
          @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="c-header__head__item__link">ログアウト</button>
            </form>
          @endauth
        </li>
        <li class="c-header__head__item">
          @guest
            <a href="{{ route('register') }}" class="c-header__head__item__link">会員登録</a>
          @endguest
          @auth
            <a href="{{ route('users.show') }}" class="c-header__head__item__link">マイページ</a>
          @endauth
        </li>
      </ul>
      <ul class="c-header__list">
        <li class="c-header__item c-header__cvBtn"><a href="{{ route('shops.index') }}" class="c-header__item__link c-header__item__link--search">ラーメン屋を探す</a></li>
        <li class="c-header__item c-header__cvBtn"><a href="{{ route('review.create') }}" class="c-header__item__link c-header__item__link--review">口コミを投稿する</a></li>
      </ul>
    </nav>
  </div>
  <div class="c-mask"></div>
</header>