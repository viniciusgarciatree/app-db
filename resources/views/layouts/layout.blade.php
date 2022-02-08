<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App-DB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <!-- Select2 theme Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('select2/bootstrap4-theme/select2-bootstrap4.min.css') }}">

    @stack('css')
    <style>
        .footer-db {
            background-color: #F3F3F3;
            padding-top: 10px;
            padding-bottom: 0px;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row">
        @include('layouts.menu')
        <main class="col-md-12 ms-sm-auto col-lg-12">
            @csrf
            @yield('content')
        </main>
    </div>
</div>
<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        

<!-- Select2 -->
<script src="{{ asset('select2/js/select2.min.js') }}" ></script>

@stack('scripts')
</body>
</html>
