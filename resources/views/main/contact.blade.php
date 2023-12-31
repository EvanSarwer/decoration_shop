
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
                <a href="{{ route('seasonal.holidays') }}" class="nav-item nav-link">Seasonal & Holidays</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="booking.html" class="dropdown-item">Booking</a> -->
                        <a href="{{ route('admin.login') }}" target="_blank" class="dropdown-item">Login</a>
                        <a href="{{ route('404') }}" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link active">Contact</a>
            </div>
            <div class="py-4 px-lg-5 d-none d-lg-block"></div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ (!empty($page_property_view->slider_images[0]->image)) ? asset('page_assets/img/' . $page_property_view->slider_images[0]->image) : asset('upload/No_Image_Available.jpg') }}');">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Contact Us //</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Phone</h5>
                                <p class="m-0"><i class="bi bi-telephone-fill text-primary me-2"></i>{{ $page_property_view->phone_number }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Email</h5>
                                <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>{{ $page_property_view->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">Opening Hours</h5>
                                <p class="m-0"><i class="bi bi-calendar-week text-primary me-2"></i>{{ $page_property_view->opening_hours1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    {!! $page_property_view->address_link !!}
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <p class="mb-4">Whether it's a birthday celebration, a romantic surprise, or a special occasion, our team is here to help you create memorable moments. Contact us today to discuss your unique decoration ideas and requirements. We'd love to hear from you!</p>
                        <form method="post" action="{{ route('send.message') }}" role="form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="name form-control" id="name" value="{{ old('name') }}" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="phone" class="phone form-control" id="phone" value="{{ old('phone') }}" placeholder="Your Phone">
                                        <label for="email">Your Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                    <input type="email" name="email" class="eml form-control" id="email" value="{{ old('email') }}" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="message form-control" name="message" placeholder="Leave a message here" id="message" style="height: 100px">{{ old('message') }}</textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <ul id="saveform_errList"></ul>
                                <div class="col-12">
                                    <button class="send_message btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->




    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Form Submit JS File -->
    <script>
    $(document).ready(function() {

        $(document).on('click', '.send_message', function(e) {
        e.preventDefault();
        console.log("Hello");
        var data = {
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
            url: "/sendmessage",
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