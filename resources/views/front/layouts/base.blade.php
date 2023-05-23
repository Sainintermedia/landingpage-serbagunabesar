<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.layouts.styles')
</head>

<body>

    <!-- ======= Header ======= -->


    @include('front.layouts.header')
    @include('front.layouts.nav')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="position-relative container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Blog</h2>
                            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                                consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                                ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        @yield('content')
        <!-- End Blog Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front.layouts.footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    @include('front.layouts.scripts')

</body>

</html>
