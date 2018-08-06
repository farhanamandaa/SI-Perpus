
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SI Perpus</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

    
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
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>   
  @yield('script')
</body>
</html>