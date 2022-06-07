<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Proje Detay</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/frontend2/assets/img/favicon.png" rel="icon">
    <link href="/frontend2/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/frontend2/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/frontend2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/frontend2/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/frontend2/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/frontend2/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/frontend2/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: iPortfolio - v3.7.0
    * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Mobile nav toggle button ======= -->
<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="/images/users/{{$user->user_file}}" alt="" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="{{route('home.index')}}">{{$user->name}}</a></h1>
            <div class="social-links mt-3 text-center">
                <a href="https://github.com/inheritance10" target="_blank" class="github"><i class="bx bxl-github"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="{{route('home.index')}}" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Anasayfa</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Proje Detay</h2>
                <ol>
                    <li><a href="{{route('home.index')}}">Anasayfa</a></li>
                    <li>Proje Detayları</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="/images/blogs/cms_blog_1.png" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="/images/blogs/cms_blog.png" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="/images/blogs/{{$blog->blog_file}}" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Proje Bilgilendirme</h3>
                        <ul>
                            <li><strong>Kategori</strong>:Yönetim Paneli (Laravel 8 && Ajax)</li>
                            <li><strong>Proje Yayınlanma Tarihi</strong>:{{$blog->created_at->format('d-m-y h:i')}}</li>
                            <li><strong>Project URL</strong>: <a href="https://github.com/inheritance10/my_blog_project" target="_blank">https://github.com/inheritance10/my_blog_project</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Proje Açıklaması</h2>
                        <p>
                            {!! $blog->blog_content !!}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>iPortfolio</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/frontend2/assets/vendor/purecounter/purecounter.js"></script>
<script src="/frontend2/assets/vendor/aos/aos.js"></script>
<script src="/frontend2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/frontend2/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/frontend2/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/frontend2/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/frontend2/assets/vendor/typed.js/typed.min.js"></script> /
<script src="/frontend2/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/frontend2/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/frontend2/assets/js/main.js"></script>

</body>

</html>
