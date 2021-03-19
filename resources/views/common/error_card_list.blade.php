@if ($errors->any())
  <div class="c-error">
    <ul class="c-error__list">
      @foreach($errors->all() as $error)
        <li class="c-error__item">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif