<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @yield('title')
  </title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div id="app">

    @include('common.common-header')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('common.common-footer')

  </div><!-- ./app -->

  <script src="{{ mix('js/app.js')}}"></script>

</body>
</html>