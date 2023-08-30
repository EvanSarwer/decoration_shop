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
                <a href="{{ route('occasions') }}" class="nav-item nav-link active">Occasion</a>
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







    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($occasion->image1)) ? url('upload/occasion_images/'.$occasion->image1) : url('upload/No_Image_Available.jpg') }}" style="object-fit: cover;" alt="">
                        
                    </div>
                </div>
                <div class="col-lg-6">

                    <h6>Ready Time <span style="color: deepPink;">– {{$occasion->ready_time  ?? 'Not available'}}</span></h6>
                    <h1 class="mb-4">{{$occasion->title ?? 'Not available'}}</h1>
                    <!-- <p class="mb-4">{{$occasion->description ?? ''}}</p> -->
                    <div class="row g-2 mb-1 pb-4">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>Category- {{ $occasion->category ?? 'N/A' }}</h6>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <small>Starting From: </small>
                    @if($occasion)
                        @if ($occasion->offer_percent > 0)
                            <h3>
                            ${{ number_format($occasion->price - ($occasion->price * ($occasion->offer_percent / 100)), 2) }}
                            <small class="text-decoration-line-through"> ${{ number_format($occasion->price, 2) }}</small>
                            <span class="badge text-danger">{{ $occasion->offer_percent }}% Offer</span>
                            </h3>
                        @else
                            <h3>${{ number_format($occasion->price, 2) }} </h3>
                        @endif
                        
                        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($occasion->title) }}%0APrice%3A%20%24{{ ($occasion->offer_percent > 0) ? (number_format($occasion->price - ($occasion->price * ($occasion->offer_percent / 100)), 2)) : (number_format($occasion->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.occasion', $occasion->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 mt-4 px-4 d-flex align-items-center justify-content-center mb-3"
                            style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); margin-top: 20px;">
                            <span style="display: inline-flex; align-items: center; color: white;">
                                <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                Book Now
                            </span>
                        </a>
                    @endif


                </div>
            </div>



            <div class="row">

                <div class="col-lg-6">

                    </br></br></br>
                    <h2 class="mb-4">Description</h2>
                    <p class="mb-4">{{$occasion->description ?? ''}}</p>
                    <div class="row g-2 mb-1 pb-1">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>{{ $occasion->text1 ?? 'N/A' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>{{ $occasion->text2 ?? 'N/A' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>{{ $occasion->text3 ?? 'N/A' }}</h6>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    


                </div>

            </div>


        </div>
    </div>
    <!-- About End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">Elevating Celebrations with Enchanting Balloon Creations</h1>
                        <p class="text-white mb-0">we're more than just balloons – we're creators of enchanting moments. With a passion for design and an eye for detail, we specialize in crafting balloon arrangements that transform ordinary spaces into extraordinary experiences. Our team of skilled artisans is dedicated to making every celebration, from birthdays to weddings, truly unforgettable. We take pride in our commitment to quality, creativity, and customer satisfaction. Let us turn your dreams into vibrant realities, one balloon at a time. Welcome to [Your Shop Name], where every occasion becomes an everlasting memory.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Book This Service</h1>


                        <form method="post" action="{{ route('book.message') }}" role="form">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="product_id" class="product_id" value="{{ $occasion->id ?? '' }}">
                                <input type="hidden" name="product_type" class="product_type" value="occasion">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" id="name" class="name form-control border-0" value="{{ old('name') }}" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" id="email" class="eml form-control border-0" value="{{ old('email') }}" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="product_name" class="form-control border-0" disabled value="{{$occasion->title ?? ''}}" placeholder="Product" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                <input type="text" name="phone" id="phone" class="phone form-control border-0" value="{{ old('phone') }}" placeholder="Your Phone" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="message form-control border-0" name="message" id="message" placeholder="Special Request">{{ old('message') }}</textarea>
                                </div>
                                <ul id="saveform_errList"></ul>
                                <div class="col-12">
                                    <button class="book_message btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Form Submit JS File -->
    <script>
    $(document).ready(function() {

        $(document).on('click', '.book_message', function(e) {
        e.preventDefault();
        console.log("Hello");
        var data = {
            'product_id': $('.product_id').val(),
            'product_type': $('.product_type').val(),
            'name': $('.name').val(),
            'email': $('.eml').val(),
            'phone': $('.phone').val(),
            'message': $('.message').val()
        }
        //console.log(data);

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/bookmessage",
            data: data,
            dataType: "json",
            success: function(response) {
            console.log(response);
            if (response.status == 400) {
                $('#saveform_errList').html("");
                $('#saveform_errList').addClass('alert alert-danger');
                $.each(response.errors, function(key, err_values) {
                $('#saveform_errList').append('<li>' + err_values + '</li>');
                })
            } else if (response.status == 200) {
                $(".name").val("");
                $(".eml").val("");
                $(".phone").val(""); //clear input field after message successfully send
                $(".message").val("");


                $('#saveform_errList').html("");
                $('#saveform_errList').removeClass('alert alert-danger');
                $('#saveform_errList').addClass('alert alert-success')
                $('#saveform_errList').text(response.message);
            }

            }
        });

        });

    });
    </script>
    



@endsection