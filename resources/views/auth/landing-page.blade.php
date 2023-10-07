<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIANAS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('flexstart/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('flexstart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('flexstart/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('flexstart/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flexstart/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('flexstart/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flexstart/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('flexstart/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('flexstart/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('images/sos.png') }}" alt="">
                {{-- <span>SIANAS</span> --}}
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#visimisi">Visi & Misi</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Get Started</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">SIANAS</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sistem Informasi Aset Nasional</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('login') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('flexstart/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Who We Are</h3>
                            <h2>SOS Children’s Villages</h2>
                            <p>
                                SOS Children’s Villages adalah organisasi sosial nirlaba non-pemerintah
                                yang aktif dalam mendukung hak-hak anak dan berkomitmen memberikan anak-anak
                                yang telah atau beresiko kehilangan pengasuhan orang tua kebutuhan utama mereka,
                                yaitu keluarga dan rumah yang penuh kasih sayang.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('images/background.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>What Makes Us Unique?</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('images/goal1.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <p>Kami percaya bahwa setiap anak berhak mendapatkan rumah yang penuh kasih sayang. Kami
                                    menguatkan keluarga yang beresiko hancur berantakan dengan memberikan dukungan yang
                                    mereka butuhkan untuk tumbuh kuat dan tetap bersama</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('images/goal2.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <p>Kami mempunyai lebih dari 571 SOS Villages di seluruh dunia. Desa-desa ini lengkap
                                    dengan rumah tempat tinggal dan pusat aktivitas anak-anak, serta akses untuk
                                    fasilitas medis, sekolah, dan area bermain untuk anak-anak kami tumbuh di lingkungan
                                    yang aman dan nyaman.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('images/goal3.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <p>Kami mempunyai lebih dari 571 SOS Villages di seluruh dunia. Desa-desa ini lengkap
                                    dengan rumah tempat tinggal dan pusat aktivitas anak-anak, serta akses untuk
                                    fasilitas medis, sekolah, dan area bermain untuk anak-anak kami tumbuh di lingkungan
                                    yang aman dan nyaman.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('images/goal4.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <p>Kami fokus pada kebutuhan masing-masing anak secara individu. Karena setiap anak
                                    tumbuh besar di lingkungan keluarga, kami dapat memahami setiap anak secara
                                    individu, dan kami bekerja bersama mereka untuk menciptakan rencana personal untuk
                                    pengembangan diri mereka.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

        <!-- ======= Features Section ======= -->
        <section id="visimisi" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Visi & Misi</p>
                </header>

                <!-- Feature Tabs -->
                <div class="row feture-tabs mt-3" data-aos="fade-up">
                    <div class="col-lg-6">
                        <h4>Kami membangun keluarga yang kuat dan penuh kasih sayang
                            untuk anak-anak yang ditinggalkan, rentan, dan kehilangan pengasuhan orang tua
                            di 135 negara termasuk Indonesia.</h4>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Visi</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Misi</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Setiap anak adalah bagian dari sebuah keluarga</h4>
                                </div>
                                <p>Keluarga adalah jantung masyarakat. Dalam sebuah keluarga setiap anak dilindungi dan
                                    merasa diterima serta menjadi bagian dari sebuah keluarga. Di dalam keluarga, anak
                                    belajar nilai, berbagi tanggung jawab dan membentuk hubungan jangka panjang.
                                    Lingkungan keluarga memberi anak pondasi yang kokoh sebagai bekal untuk membangun
                                    kehidupannya.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Setiap anak tumbuh dengan cinta</h4>
                                </div>
                                <p>Melalui kasih sayang dan penerimaan, luka batin tersembuhkan dan kepercayaan diri
                                    anak terbangun. Anak belajar untuk mempercayai dirinya dan orang lain. Dengan
                                    kepercayaan diri ini setiap anak mampu memahami dan mengasah potensi yang
                                    dimilikinya.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4> Setiap anak tumbuh dengan rasa hormat</h4>
                                </div>
                                <p>Setiap pendapat anak didengarkan dan ditanggapi dengan serius. Anak berpartipasi
                                    dalam membuat keputusan yang berdampak bagi kehidupannya dan dibimbing untuk
                                    berperan aktif dalam proses pengembangan dirinya. Anak tumbuh dengan rasa hormat dan
                                    harga diri sebagai bagian dari keluarga dan masyarakat.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Setiap anak tumbuh dengan rasa aman</h4>
                                </div>
                                <p>Anak dilindungi dari kekerasaan, pengabaian dan segala bentuk eksploitasi dan
                                    mendapat perlindungan ketika bencana alam dan perang terjadi. Anak berhak memiliki
                                    tempat berlindung, terpenuhi pangannya, memperoleh layanan kesehatan dan pendidikan.
                                    Hal tersebut adalah kebutuhan yang paling mendasar bagi tumbuh kembang anak.</p>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kami membangun keluarga bagi anak yang kehilangan pengasuhan</h4>
                                </div>
                                <p>Kami hadir memberikan keluarga pengganti bagi anak-anak yang telah kehilangan
                                    pengasuhan baik disebabkan oleh orang tua yang meninggal dunia, kemiskinan, dan
                                    faktor-faktor lainnya. Pendekatan keluarga yang diterapkan di SOS Children’s
                                    Villages berlandaskan empat prinsip yakni setiap anak membutuhkan sosok seorang ibu,
                                    dan hidup bersama adik kakak, dalam rumah keluarga, di lingkungan masyarakat yang
                                    mendukung.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kami membantu mereka membangun masa depan</h4>
                                </div>
                                <p>Kami memberikan kesempatan bagi setiap anak untuk tumbuh dan berkembang berdasarkan
                                    kebudayaan dan agamanya serta berperan aktif dalam masyarakat.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kami membantu anak untuk memahami dan mengasah kemampuan, minat, dan bakatnya.
                                    </h4>
                                </div>
                                <p>Kami menjamin bahwa setiap anak memperoleh pendidikan dan pelatihan keterampilan yang
                                    dibutuhkan untuk mencapai sukses dan mampu berkontribusi bagi masyarakat.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kami mendukung pemberdayaan masyarakat</h4>
                                </div>
                                <p>Kami berbagi dengan masyarakat dan merespon kebutuhan pengembangan sosial bagi
                                    kelompok masyarakat yang rentan (dimana di dalamnya tinggal anak-anak dan remaja
                                    yang beresiko kehilangan pengasuhan) Kami membangun fasilitas dan program yang
                                    bertujuan untu penguatan keluarga dan mencegah keterpisahan anak dengan keluarga.
                                    Kami berkolaborasi dengan masyarakat untuk menyediakan pendidikan dan layanan
                                    kesehatan serta berbagai dukungan tanggap darurat. </p>
                            </div><!-- End Tab 2 Content -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('flexstart/assets/img/features-2.png') }}" class="img-fluid"
                            alt="">
                    </div>
                </div><!-- End Feature Tabs -->
            </div>
        </section><!-- End Features Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>KITA ADA</p>
                    <h4 class="mt-3">Untuk Setiap Anak, Agar Mereka Tidak Tumbuh Sendirian</h4>
                    <h4>#NOCHILDALONE</h4>
                </header>

                <div class="row gy-4" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <h3 style="color: #07d5c0;">Anak Asuh SFC</h3>
                            <div class="price">1009</div>
                            <img src="{{ asset('images/childrens.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <h3 style="color: #65c600;">Anak Pendampingan FSP</h3>
                            <div class="price">4719</div>
                            <img src="{{ asset('images/family.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="box">
                            <h3 style="color: #ff901c;">Anak Rentan (SFC & FSP)</h3>
                            <div class="price">5500</div>
                            <img src="{{ asset('images/kid.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="box">
                            <h3 style="color: #ff0071;">Keluarga Dampingan FSP</h3>
                            <div class="price">2400</div>
                            <img src="{{ asset('images/mother.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End Pricing Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('images/motto.png') }}" alt="" class="img-fluid">
                        </a>
                        <h4>Social Media</h4>
                        <div class="social-links">
                            <a href="https://www.youtube.com/user/SOSCVIndonesia" class="youtube"><i
                                    class="bi bi-youtube"></i></a>
                            <a href="https://twitter.com/desaanaksos" class="twitter"><i
                                    class="bi bi-twitter"></i></a>
                            <a href="https://www.facebook.com/desaanaksos" class="facebook"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/desaanaksos/" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/7590901/" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>National Office</h4>
                        <p>
                            SOS Children's Villages Indonesia<br>
                            Jl. Sari Endah No.9<br>
                            Bandung 40152 - Indonesia<br><br>
                            <strong>Phone:</strong> 022-2012 881<br>
                            <strong>Email:</strong> sos@sos.or.id<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Kontak Media</h4>
                        <p>
                            Fund Development & Communication<br>
                            Jl. Jati Padang Utara No.13<br>
                            Jakarta 12540 - Indonesia<br><br>
                            <strong>Phone:</strong> 021-22785534<br>
                            <strong>Email:</strong> kontak@sos.or.id<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Kontak Developer</h4>
                        <p>
                            Jl. Masjid, Lamreung,<br>
                            Kec. Darul Imarah, Kabupaten Aceh Besar<br>
                            Aceh 23122 - Indonesia<br><br>
                            <strong>Phone:</strong> +626518071113<br>
                            <strong>Email:</strong> bandaaceh@sos.or.id<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>LINKS</h4>
                        <p>
                            <a href="https://www.sos.or.id/links/caf-certificate">CAF Certificate</a> <br>
                            <a href="https://www.sos.or.id/karir">Lowongan Kerja</a> <br> <br>
                            <strong>Registrasi Nomor:</strong> 011.31.75.08.1002.136<br>
                            <strong>Yayasan SOS Desa Taruna Indonesia</strong><br><br>
                            <img src="{{ asset('images/caf.png') }}" alt=""
                                class="img-fluid logo d-flex align-items-center">
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('flexstart/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('flexstart/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('flexstart/assets/js/main.js') }}"></script>

</body>

</html>
