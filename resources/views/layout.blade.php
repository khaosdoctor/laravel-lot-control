<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $page_title }}</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <header>
      @include('header', ['page_title'=>$page_title])
  </header>

  <div class="main-content container-fluid">
    <main>
      <div class="row">
        @yield('conteudo')
      </div>
    </main>
  </div>

  <footer>
      @include('footer')
  </footer>
</body>
</html>