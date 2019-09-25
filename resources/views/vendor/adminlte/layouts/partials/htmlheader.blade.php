<head>
    <meta charset="UTF-8">
    <title> Megatravel - @yield('htmlheader_title', 'Admin') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('bootstrap')

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datatables.css') }}">
    <link rel="stylesheet" href="https://cafe.megatravel.com.mx/assets/css/section.css">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />



    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
