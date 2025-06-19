<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>RentNGo</title>
    <meta name="description" content="Sewa alat camping berkualitas">
    <meta name="keywords" content="sewa camping, rental alat outdoor, tenda camping, perlengkapan hiking">

    <!-- Favicons -->
    <link href="{{ asset('Dewi') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('Dewi') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Dewi') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('Dewi') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('Dewi') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('Dewi') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('Dewi') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('Dewi') }}/assets/css/main.css" rel="stylesheet">

    <style>
        /* Custom CSS untuk section */

        #about {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-img {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
        }

        .about-img img {
            width: 100%;
            height: auto;
            transition: transform 0.3s;
        }

        .about-img img:hover {
            transform: scale(1.05);
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .about-text p {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #555;
        }

        .about-text ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .about-text ul li {
            margin-bottom: 10px;
        }

        /* Contact Section Styles */
        #contact {
            padding: 80px 0;
            background-color: #fff;
        }

        .contact-content {
            display: flex;
            gap: 50px;
        }

        .contact-info {
            flex: 1;
        }

        .contact-form {
            flex: 1;
        }

        .contact-list {
            list-style: none;
            padding: 0;
        }

        .contact-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .contact-list i {
            font-size: 1.2rem;
            margin-right: 15px;
            color: #0d6efd;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border-radius: 50%;
            font-size: 1.2rem;
            color: #333;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #0d6efd;
            color: #fff;
        }

        .php-email-form .form-control {
            height: 50px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .php-email-form textarea.form-control {
            height: auto;
        }

        .php-email-form button {
            background: #0d6efd;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .php-email-form button:hover {
            background: #0b5ed7;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">RentNGo</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>

                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('Dewi') }}/assets/img/camping.jpeg" alt="Camping Background" data-aos="fade-in">
            <div class="container d-flex flex-column align-items-center">
                <h2 data-aos="fade-up" data-aos-delay="100">RentNGo</h2>
                <p data-aos="fade-up" data-aos-delay="200">Tempat sewa alat camping terpercaya dengan kualitas terbaik
                </p>


                <!-- HANYA INI SAJA YANG ADA DI FILE ANDA -->
                <div class="video-button-container" data-aos="fade-up" data-aos-delay="300">
                    <a href="https://www.instagram.com/reel/DKj1owMySOw/" class="instagram-video-btn" target="_blank"
                        rel="noopener noreferrer">
                        <i class="bi bi-play-circle"></i> Tonton Video Kami
                    </a>
                </div>

                <style>
                    /* CSS KHUSUS UNTUK BUTTON INI SAJA */
                    .video-button-container {
                        margin-top: 1.5rem;
                        text-align: center;
                    }

                    .instagram-video-btn {
                        background: linear-gradient(135deg, #FF9A8B, #FF6B95);
                        color: white !important;
                        font-weight: 600;
                        padding: 12px 30px;
                        border-radius: 50px;
                        box-shadow: 0 4px 15px rgba(255, 106, 149, 0.4);
                        transition: all 0.4s cubic-bezier(0.65, 0, 0.35, 1);
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        text-decoration: none;
                        font-size: 1.1rem;
                        border: none;
                        cursor: pointer;
                    }

                    .instagram-video-btn:hover {
                        background: linear-gradient(135deg, #FF6B95, #FF9A8B);
                        transform: translateY(-3px) scale(1.02);
                        box-shadow: 0 8px 25px rgba(255, 106, 149, 0.6);
                    }

                    .instagram-video-btn:active {
                        transform: translateY(1px) scale(0.98);
                    }

                    .instagram-video-btn i {
                        font-size: 1.3rem;
                    }
                </style>
            </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container">
                <div class="section-title">
                    <h2>Tentang Kami</h2>
                    <p>Kenali lebih jauh tentang RentNGo</p>
                </div>

                <div class="about-content">
                    <div class="about-img" data-aos="fade-right">
                        <img src="{{ asset('Dewi') }}/assets/img/bg.jpeg" alt="Tentang RentNGo">
                    </div>
                    <div class="about-text" data-aos="fade-left">
                        <h3>Kami menyediakan perlengkapan camping berkualitas tinggi</h3>
                        <p>
                            RentNGo adalah penyedia jasa sewa alat camping dan outdoor terpercaya di Indonesia.
                            Kami berkomitmen untuk memberikan pengalaman camping terbaik dengan menyediakan
                            peralatan berkualitas tinggi dan layanan yang memuaskan.
                        </p>
                        <p>
                            Dengan pengalaman lebih dari 5 tahun di industri outdoor, kami memahami kebutuhan
                            para pecinta alam dan selalu berusaha memberikan yang terbaik untuk pelanggan kami.
                        </p>

                        <h3>Mengapa memilih kami?</h3>
                        <ul>
                            <li>Peralatan berkualitas tinggi dan terawat baik</li>
                            <li>Harga kompetitif dan transparan</li>
                            <li>Layanan pelanggan 24/7</li>
                            <li>Proses sewa mudah dan cepat</li>
                            <li>Banyak pilihan paket camping</li>
                        </ul>

                        <p>
                            Tim kami terdiri dari para profesional yang berpengalaman di bidang outdoor
                            dan siap membantu Anda merencanakan petualangan terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <div class="container">
                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                    <p>Silakan hubungi kami untuk informasi lebih lanjut</p>
                </div>

                <div class="contact-content">
                    <div class="contact-info" data-aos="fade-right">
                        <h3>Informasi Kontak</h3>
                        <ul class="contact-list">
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <span>Jl. Camping No. 123, Jakarta</span>
                            </li>
                            <li>
                                <i class="bi bi-telephone"></i>
                                <span>+62 123 4567 890</span>
                            </li>
                            <li>
                                <i class="bi bi-envelope"></i>
                                <span>info@rentngo.com</span>
                            </li>
                            <li>
                                <i class="bi bi-clock"></i>
                                <span>Buka setiap hari: 08.00 - 20.00 WIB</span>
                            </li>
                        </ul>

                        <div class="social-links mt-4">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="contact-form" data-aos="fade-left">
                        <form action="" method="post" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                    required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>RentNGo</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Dewi') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('Dewi') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('Dewi') }}/assets/js/main.js"></script>

    <script>
        // Smooth scrolling untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });

                // Update active class di navbar
                document.querySelectorAll('nav ul li a').forEach(link => {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Update active class saat scroll
        window.addEventListener('scroll', function() {
            let fromTop = window.scrollY + 100;

            document.querySelectorAll('nav ul li a').forEach(link => {
                let section = document.querySelector(link.hash);

                if (
                    section.offsetTop <= fromTop &&
                    section.offsetTop + section.offsetHeight > fromTop
                ) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    </script>

</body>

</html>
