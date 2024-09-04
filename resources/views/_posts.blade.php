<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kesehatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0dc31b6631.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero {
            background-color: #007bff;
            color: #ffffff;
            padding: 100px 0;
            animation: fadeInUp 1s ease-out;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: top 0.10s;
        }

        .navbar.scrolled {
            top: -50px;
        }

        .btn-lg {
            transition: transform 0.3s ease-in-out;
        }

        .btn-lg:hover {
            transform: scale(1.1);
        }

        .rotated-image {
            transform: rotate(45deg);
            transition: transform 0.5s ease-in-out;
        }

        .rotated-image:hover {
            transform: rotate(0deg);
        }

        .nav-item:hover .nav-link {
            color: #1E90FF;
        }

        .nav-item .nav-link {
            transition: color 0.3s ease;
        }

        /* About Section */
        .about {
            background-color: #f8f9fa;
            padding: 100px 0;
            animation: fadeInUp 1s ease-out;
        }

        .about h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        /* Services Section */
        .services {
            padding: 100px 0;
            animation: fadeInUp 1s ease-out;
        }

        .services h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        /* Footer Section */
        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 30px 0;
            animation: fadeInUp 1s ease-out;
        }

        .footer p {
            margin-bottom: 0;
        }

        .footer a {
            color: #ffffff;
        }

        .footer a:hover {
            color: #f8f9fa;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('') }}
            </h2>
        </x-slot>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="#">Website Kesehatan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Layanan</a>
                        </li>
                        <li class="nav-item">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    <i class="fa-solid fa-user pt-2"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    <i class="fa-solid fa-user fa-fade pt-3 ps-1"></i>
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container text-center">
                <h1>Selamat Datang di Website Kesehatan</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="/artikel" class="btn btn-light btn-lg">Mulai Sekarang</a>
            </div>
        </section>

        <!-- About Section -->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Tentang Kami</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra magna eget lacus
                            ullamcorper congue.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                    <div class="col-md-6">
                        <img src="{{url('/storage/dokter.png')}}" class="img-fluid rotated-image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="container">
                <h2 class="text-center">Layanan Kami</h2>
                <div class="row mt-4">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card">
                                <!-- Tambahkan gambar di sini -->
                                <img src="{{ url('/storage/'.$post->image) }}" class="card-img-top"
                                    style="width: 410px; height: 300px;" alt="{{ $post->title }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ Str::limit($post->body, 50) }}</p>
                                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="footer">
            <div class="container text-center">
                <p>&copy; 2023 Website Kesehatan</p>
            </div>
        </footer>

    </x-app-layout>
    <script>
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.querySelector(".navbar").classList.add("scrolled");
            } else {
                document.querySelector(".navbar").classList.remove("scrolled");
            }
        }
    </script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
