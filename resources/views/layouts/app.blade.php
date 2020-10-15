 @include('includes.head')
<body>
    <div id="app">
        @include('includes.header')

        <main id="main">

          <!-- ======= Breadcrumbs ======= -->
          <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

              <div class="d-flex justify-content-between align-items-center">
                <h2>Current Page</h2>
                <ol>
                  <li><a href="/home">Home</a></li>
                  <li>Current Page</li>
                </ol>
              </div>

            </div>
          </section><!-- End Breadcrumbs -->
          <section id="" class="">
                @yield('content')
          </section>
        </main>
        @include('includes.footer')
    </div>
    
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
</body>
</html>
