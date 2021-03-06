<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <div class="logo"><a href="/" class="simple-text logo-normal">
                Art Store
            </a></div>
        @include('includes.sidebar')

    </div>
    <div class="main-panel">
        <!-- Navbar -->
        @include('includes.navbar')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
        @include('includes.footer')
        @yield('js')
    </div>
</div>
{{--@include('includes.buttonChangeTheme')--}}
<!--   Core JS Files   -->
@include('includes.script')
</body>

</html>
