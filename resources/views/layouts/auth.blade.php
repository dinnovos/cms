<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ setting('project', config('app.name', 'Laravel')) }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('global-vendor/theme-panel/css/codebase.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global-vendor/theme-panel/css/themes/corporate.min.css') }}">

        <link rel="stylesheet" href="{{ asset('global-vendor/notyf/notyf.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">

        @yield('css')

        @yield('js_header')

    </head>

    <body>
        
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                
                @yield('content')

            </main>
            <!-- END Main Container -->

        </div>
        <!-- END Page Container -->

        <script src="{{ asset('global-vendor/theme-panel/js/codebase.core.min.js')}}"></script>
        <script src="{{ asset('global-vendor/theme-panel/js/codebase.app.min.js')}}"></script>

        <script src="{{ asset('global-vendor/notyf/notyf.js') }}"></script>

        @if(Session::has('alert_error'))
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    new Notyf({delay:3000}).error('{!! Session('alert_error') !!}');
                });
            </script>
        @endif

        @if(Session::has('alert_success'))
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    new Notyf({delay:3000}).success('{!! Session('alert_success') !!}');
                });
            </script>
        @endif

        @yield('js')
        @yield('modals')
    </body>
</html>