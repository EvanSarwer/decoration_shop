@extends('main.main')
@section('main')



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Kanak Decoration</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('balloons') }}" class="nav-item nav-link">Balloons</a>
                <a href="{{ route('occasions') }}" class="nav-item nav-link">Occasion</a>
                <a href="{{ route('seasonal.holidays') }}" class="nav-item nav-link">Seasonal & Holidays</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="booking.html" class="dropdown-item">Booking</a> -->
                        <a href="{{ route('admin.login') }}" class="dropdown-item">Login</a>
                        <a href="{{ route('404') }}" class="dropdown-item active">404 Page</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="py-4 px-lg-5 d-none d-lg-block"></div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(page_assets/img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Not Found</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">404</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page Not Found</h1>
                    <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('index') }}">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->





@endsection
