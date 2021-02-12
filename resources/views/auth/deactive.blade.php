@extends('app')

@section('title', '退会｜ラーメンログ｜群馬のラーメン口コミ検索サイト')

@section('content')

<main class="l-main">

  <div class="page-withdrawal">
    <div class="l-content-lg">

      <form action="{{ route('deactive') }}" method="post">
        <h2 class="c-primary__heading"><span class="c-primary__heading__en">WITHDRAWAL</span>退会手続き画面</h2>
        <p class="page-withdrawal__lead">退会お手続きが完了するとデータの復元はできません。ご注意ください。</p>
        <div class="p-form__content">
          <div class="c-form__btn">
            <button type="submit" class="c-primary__btn" value="">退会する</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>

</main>



@endsection