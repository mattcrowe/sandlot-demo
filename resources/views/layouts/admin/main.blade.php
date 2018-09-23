<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.partials.head')
    @include('layouts.admin.scripts.head-close')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('layouts.admin.partials.header')

@include('layouts.admin.partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div id="app">
            <router-view></router-view>
        </div>
        @yield('main')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin.partials.sidebar')
</div>
<!-- ./wrapper -->

@include('layouts.admin.scripts.body-close')
</body>
</html>
