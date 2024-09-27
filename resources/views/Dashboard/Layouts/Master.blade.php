<!DOCTYPE html>
<html lang="en">


@include('Dashboard.Layouts.Head')

<body>

    <!-- ======= Header ======= -->
    @include('Dashboard.Layouts.Header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('Dashboard.Layouts.Sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        @include('Dashboard.Layouts.Breadcramb')<!-- End Page Title -->

            <!-- عنصر الـ loader -->
            <div class="loader-container">
                <div class="loader"></div>
            </div>

            <!-- محتوى الصفحة -->
        @yield('content')


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('Dashboard.Layouts.Footers')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- ======= Scribts ======= -->
    @include('Dashboard.Layouts.Scribts')
    <!-- =======End Scribts ======= -->

</body>

</html>
