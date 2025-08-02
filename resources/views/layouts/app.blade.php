<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    @yield('title')
  </title>
  <script src="{{ asset('module/Theme.js') }}"></script>
  <script>
    theme.set_theme_state(theme.get_theme_state());
  </script>
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
  @yield('customize-css')
</head>

<body>
  <div>
    @yield('main')
  </div>
  @yield('customize-js')
</body>

</html>
