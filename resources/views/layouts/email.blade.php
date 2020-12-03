<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <style>
        
    </style>


@yield('custom_css')

<head>
    
</head>
<body>

    <div style="text-align:left;">
        <div style="display: inline-block; text-align:left;">    
            @yield('content')

            <hr>

            <div>

            </div>

            <!-- mail footer company name and current year -->
            <footer style="text-align: left;">
               {{-- <p class="copyright_area">&copy; {{date('Y')}} crofun.jp</p> --}}
            </footer>
        </div>

        
    </div>      
    @yield('custom_js')
</body>
</html>
