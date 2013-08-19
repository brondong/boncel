<!DOCTYPE html>
<html>
<head>
  <title>Boncel Link</title>
  <meta name="keywords" content="boncel link, url shortener, tiny link, web application" />
  <meta name="description" content="Aplikasi untuk memperpendek URL" />
  <meta name="author" content="Heru Rusdianto" />
  <meta name="robots" content="index,follow" />

  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/darkstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>

<body>
  <div class="well text-center">
      <h1>404</h1>

      <h2>Not Found</h2>

      <hr />

      <h3>Halaman yang anda minta tidak ditemukan.</h3>

      <br />

      <h5>Anda akan dialihkan ke halaman utama aplikasi.</h5>

      <br />

      <div class="progress">
        <div class="bar" style="width: 0%;"></div>
      </div>

      <br />

      <h6 class="text-right">Boncel Link</h6>
  </div>
</body>

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  var home = "{{ route('home') }}";

  var progress = setInterval(function() {
    var bar = $('.bar');

    if (bar.width() == 400) {
      $(location).prop('href', home);
    } else {
      bar.width(bar.width() + 80);
    }

    bar.text(bar.width() / 4 + "%");
  }, 800);
</script>
</html>