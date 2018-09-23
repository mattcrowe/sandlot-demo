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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div id="app">
                <router-view></router-view>
            </div>
            @yield('main')
            <!-- Main row -->
            <div class="row"></div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin.partials.sidebar')
</div>
<!-- ./wrapper -->

@include('layouts.admin.scripts.body-close')
</body>
</html>
