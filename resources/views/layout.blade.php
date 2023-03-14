<!DOCTYPE html>
<html lang="tr">
@include('components.head')
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')
    @yield('content')
    @include('components.footer')
    @include('components.js')
    {{--    Toast Message--}}
    @include('components.toast_message')
</div>
</body>
</html>
