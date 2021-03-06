<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App-DB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    


    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <!-- Select2 theme Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('select2/bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-select/css/bootstrap-select.min.css') }}">

    <!-- alertifyjs -->
    <link rel="stylesheet" href="{{ asset('alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alertifyjs/css/themes/bootstrap.min.css') }}">


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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="{{ asset('select2-4.1.0/dist/js/select2.full.min.js') }}" ></script>
<script src="{{ asset('select2-4.1.0/dist/js/i18n/pt-BR.js') }}" ></script>

<!-- alertifyjs -->
<script src="{{ asset('alertifyjs/alertify.min.js') }}" ></script>

<script type="text/javascript">
    $( document ).ready(function() {
        alertify.set('notifier','position', 'top-right');
    });
</script>

@stack('scripts')

<script>
    
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
</body>
</html>
