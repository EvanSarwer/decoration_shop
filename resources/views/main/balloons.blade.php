@extends('main.main')
@section('main')


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>Kanak Decoration</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('balloons') }}" class="nav-item nav-link active">Balloons</a>
                <a href="{{ route('occasions') }}" class="nav-item nav-link">Occasion</a>
                <a href="{{ route('seasonal.holidays') }}" class="nav-item nav-link">Seasonal & Holidays</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="booking.html" class="dropdown-item">Booking</a> -->
                        <a href="{{ route('admin.login') }}" class="dropdown-item">Login</a>
                        <a href="{{ route('404') }}" class="dropdown-item">404 Page</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Balloons</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('balloons') }}">Balloons</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            @if( $balloons && count($balloons) > 0 )
                @foreach($balloons as $key => $balloon)

                    <div class="col-lg-4 col-md-6 ">
                        <div class="hotel" style="width: 300px; max-height: 550px; min-height: 550px; object-fit: cover;">
                            <div class="hotel-img">
                            <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="balloon" class="img-fluid">
                            </div>
                            <h3><a href="{{ route('single.balloon', $balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                            <p style="font-size: 20px;">
                                @if ($balloon->price > 0)
                                    @if ($balloon->offer_percent > 0)
                                        <span>
                                            ₹{{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ₹{{ number_format($balloon->price, 2) }}</small>
                                        </span> </br>
                                        <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                                    @else
                                        ₹{{ number_format($balloon->price, 2) }}
                                    @endif

                                @else
                                    <small>Message us for best price</small>
                                @endif
                            </p>
                            <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%E2%82%B9{{ ($balloon->price > 0) ? (($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2))) : '' }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
                            style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                <span style="display: inline-flex; align-items: center; color: white;">
                                    <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                    Book Now
                                </span>
                            </a>
                        </div>
                    </div>

                @endforeach
            @else
                <h3><a href="#">Not Available In This Category</a></h3>
            @endif


        </div>
      </div>

    </section>
    <!-- End Hotels Section -->








@endsection