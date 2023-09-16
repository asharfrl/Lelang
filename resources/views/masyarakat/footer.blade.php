  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Lelang Online<span>.</span></h3>
              <p>
                Jl. Raya Parung - Ciputat No.88 <br>
                Kedaung, Kec. Sawangan<br>
                Kota Depok, Jawa Barat 16516 <br><br>
                <strong>{{ Auth::user()->level }}</strong><br>
                <strong>Email:</strong>{{ Auth::user()->email }}<br>
              </p>
            </div>
          </div>
        </div>
      </div>

    <div class="container py-4">
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  {{-- <div id="preloader"></div> --}}
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('BizLand')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('BizLand')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('BizLand')}}/assets/js/main.js"></script>

</body>

</html>
