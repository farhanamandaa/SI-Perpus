
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
	<title>Gentelella</title>
</head>
<body>
  @include('layout.header')
  @if(auth()->user()->role_id == 1)
    @include('admin.sidebar')
  @else
    @include('user.sidebar')
  @endif
  @include('layout.footer')
  @include('layout.top')
  @yield('content')

  <!-- js -->
  <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>