
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.style')
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    @include('admin.layout.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.layout.navbar')
        <div class="main-panel">

            @yield('content')
        </div>

    </div>

    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.layout.scripts')
</body>
</html>

