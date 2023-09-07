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
                <a href="{{ route('balloons') }}" class="nav-item nav-link">Balloons</a>
                <a href="{{ route('occasions') }}" class="nav-item nav-link">Occasion</a>
                <a href="{{ route('seasonal.holidays') }}" class="nav-item nav-link active">Seasonal & Holidays</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="booking.html" class="dropdown-item">Booking</a> -->
                        <a href="{{ route('admin.login') }}" target="_blank" class="dropdown-item">Login</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Packages</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('seasonal.holidays') }}">Seasonal & Holidays</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Packages</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
                <h1 class="mb-5">Our Expert Technicians</h1>
            </div> -->
            <div class="row">


            @if( $seasonalHolidays && count($seasonalHolidays) > 0 )
                @foreach($seasonalHolidays as $key => $holiday)

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item" style="width: 350px; max-height: 550px; min-height: 550px; object-fit: cover;">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ (!empty($holiday->image1)) ? url('upload/holiday_images/'.$holiday->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 350px; max-height: 350px; min-height: 350px; object-fit: cover;"  alt="seasonal&holiday">
                                <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                    
                                <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($holiday->title) }}%0APrice%3A%20%E2%82%B9{{ ($holiday->price > 0) ? (($holiday->offer_percent > 0) ? (number_format($holiday->price - ($holiday->price * ($holiday->offer_percent / 100)), 2)) : (number_format($holiday->price, 2))) : '' }}%0AProduct%20url%3A%20{{ urlencode(route('seasonal.holidays')) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                                    
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h5 class="fw-bold mb-0">{{ $holiday->title }}</h5>
                                <div class="text-left">
                                    @if ($holiday->text1)
                                        <i class="fas fa-check-circle text-success"></i> {{ $holiday->text1 }}
                                        <br>
                                    @endif
                                    
                                    @if ($holiday->text2)
                                        <i class="fas fa-check-circle text-success"></i> {{ $holiday->text2 }}
                                        <br>
                                    @endif
                                    
                                    @if ($holiday->text3)
                                        <i class="fas fa-check-circle text-success"></i> {{ $holiday->text3 }}
                                    @endif
                                </div>
                                
                                <p style="font-size: 20px;">
                                @if ($holiday->price > 0)
                                    @if ($holiday->offer_percent > 0)
                                        <span>
                                        ₹{{ number_format($holiday->price - ($holiday->price * ($holiday->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ₹{{ number_format($holiday->price, 2) }}</small>
                                        </span> </br>
                                        <span class="badge text-danger">{{ number_format($holiday->offer_percent, 2) }}% Offer</span>
                                    @else
                                        ₹{{ number_format($holiday->price, 2) }}
                                    @endif
                                @else
                                    <small>Message us for best price</small>
                                @endif

                                </p>
                            </div>
                        </div>
                    </div>


                @endforeach
            @else
                <h3><a href="#">Not Available In This Category</a></h3>
            @endif
                


            </div>
        </div>
    </div>
    <!-- Team End -->








@endsection