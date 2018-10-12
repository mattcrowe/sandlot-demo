<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.partials.head')
    @include('layouts.admin.scripts.head-close')
</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
@yield('main')
@include('layouts.admin.scripts.body-close')
</body>
</html>
