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
    <header><h2>Boncel Link Application</h2></header>

    <div class="control-group controls" id="control-url">
      <input type="text" name="url" id="url" class="inputan input-xxlarge" maxlength="200" autocomplete="off" title="URL Asli" placeholder="Ketikkan URL asli disini..." />
      <span class="help-block" id="error-url"></span>
    </div>

    <div class="control-group controls" id="control-alias">
      <input type="text" name="alias" id="alias" class="inputan input-xlarge" maxlength="40" autocomplete="off" title="URL Alias" placeholder="Ketikkan alias disini..." />
      <span class="help-block" id="error-alias"></span>
    </div>

    <div class="control-group controls" id="control-hasil">
      <input type="text" name="hasil" id="hasil" title="URL Hasil" placeholder="Hasil URL pendek disini..." readonly />
    </div>

    <div>
      <button class="btn btn-inverse" onclick="submitURL()" title="Submit"><i class="icon-ok"></i></button>
    </div>

    <div class="tabel"></div>
  </div>
</body>

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/zclip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript">
  var home = "{{ route('home') }}";
  var tabel = "{{ route('tabel') }}";
  var submit = "{{ route('submit') }}";
</script>
</html>