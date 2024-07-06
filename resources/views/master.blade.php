<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads-Capture | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.ico') }}">
  
    <!-- CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <!-- CSS Local -->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/campanha.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custon.css') }}">

    
</head>
<body>
    @include('includes.sidebar')
    @yield('content')


    <!-- JS Externos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- datatables --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- js local -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/resultados.js') }}"></script>
    <script src="{{ asset('assets/js/custon.js') }}"></script>
</body>
</html>