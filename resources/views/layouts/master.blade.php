<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    @yield('first')
    @include('layouts.components.style')

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        @include('layouts.components.sidenav-menu')

        @include('layouts.components.topbar')

        @include('layouts.components.search-modal')

        <div class="page-content">
            <div class="page-container">
                @yield('content')
            </div>
            @include('layouts.components.footer')

        </div>

    </div>
    <!-- END wrapper -->

    @include('layouts.components.theme-settings')

    @include('layouts.components.script')
    @yield('last')
</body>

</html>
