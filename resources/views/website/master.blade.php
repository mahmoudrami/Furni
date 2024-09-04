<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Untree.co">
        <link rel="shortcut icon" href="favicon.png">

        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap4" />

        <!-- Bootstrap CSS -->
        <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('website/css/tiny-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
        <title>@yield('title', env('APP_NAME'))</title>
        @yield('css')
    </head>

    <body>

        <!-- Start Header/Navigation -->
        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark"
            arial-label="Furni navigation bar">

            <div class="container">
                <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                    aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsFurni">
                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('about') }}">About us</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'Services' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('Services') }}">Services</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'Post' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('Post') }}">Blog</a></li>
                        <li class="nav-item {{ Route::currentRouteName() == 'Contact' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('Contact') }}">Contact us</a></li>
                    </ul>

                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

                        @if (Auth::check())
                            <h1>{{ Auth::user()->name }}</h1>
                        @else
                            <li><a class="nav-link" href="#"><img
                                        src="{{ asset('website/images/user.svg') }}"></a>
                        @endif
                        </li>
                        <li><a class="nav-link" href="{{ route('Cart') }}"><img
                                    src="{{ asset('website/images/cart.svg') }}"></a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <!-- End Header/Navigation -->

        <!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                            <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                                Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                            <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                                    class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ asset('website/images/couch.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->
        @yield('content')

        <!-- Start Footer Section -->
        <footer class="footer-section">
            <div class="container relative">

                <div class="sofa-img">
                    <img src="{{ asset('website/images/sofa.png') }}" alt="Image" class="img-fluid">
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="subscription-form">
                            <h3 class="d-flex align-items-center"><span class="me-1"><img
                                        src="{{ asset('website/images/envelope-outline.svg') }}" alt="Image"
                                        class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                            <form action="#" class="row g-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="col-auto">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">
                                        <span class="fa fa-paper-plane"></span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="row g-5 mb-5">
                    <div class="col-lg-4">
                        <div class="mb-4 footer-logo-wrap"><a href="#"
                                class="footer-logo">Furni<span>.</span></a>
                        </div>
                        <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl
                            dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor
                            tristique. Pellentesque habitant</p>

                        <ul class="list-unstyled custom-social">
                            <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-8">
                        <div class="row links-wrap">
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Knowledge base</a></li>
                                    <li><a href="#">Live chat</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Our team</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Nordic Chair</a></li>
                                    <li><a href="#">Kruzo Aero</a></li>
                                    <li><a href="#">Ergonomic Chair</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="border-top copyright">
                    <div class="row pt-4">
                        <div class="col-lg-6">
                            <p class="mb-2 text-center text-lg-start">Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>. All Rights Reserved. &mdash; Designed with love by <a
                                    href="https://untree.co">Untree.co</a> Distributed By <a
                                    hreff="https://themewagon.com">ThemeWagon</a>
                                <!-- License information: https://untree.co/license/ -->
                            </p>
                        </div>

                        <div class="col-lg-6 text-center text-lg-end">
                            <ul class="list-unstyled d-inline-flex ms-auto">
                                <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </footer>
        <!-- End Footer Section -->


        <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('website/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('website/js/custom.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        @yield('script')
    </body>

</html>
