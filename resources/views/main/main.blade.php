<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kanak Decoration - Decoration Accessories Hub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('page_assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=REM:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('page_assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('page_assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('page_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('page_assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('page_assets/css/style.css') }}" rel="stylesheet">




    <style>
        /* Style for the fixed buttons container */
        .fixed-buttons-container {
            position: fixed;
            top: 50%;
            right: 20px; /* Adjust the right offset as needed */
            transform: translateY(-50%);
            z-index: 999;
        }

        /* Style for the square buttons */
        .phone-button {
            background-color: blue; /* Blue color for the phone button */
            border: 2px solid;
            width: 50px;
            height: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            text-decoration: none;
            color: white; /* White icon color for the phone button */
            border-radius: 10px;
        }

        .whatsapp-button {
            background-color: green; /* Green color for the WhatsApp button */
            border: 2px solid;
            width: 50px;
            height: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white; /* White icon color for the WhatsApp button */
            border-radius: 10px;
        }

        /* Style for the icons */
        .square-button i {
            font-size: 24px; /* Adjust the icon size */
        }
    </style>





</head>


<body>

      <!-- Fixed Buttons -->
    <div class="fixed-buttons-container">
        <a title="Call Us" href="tel:{{$page_property_view->phone_number}}" target="_blank" class="square-button phone-button">
            <i class="fas fa-phone"></i> <!-- Font Awesome phone icon -->
        </a>
        <a title="Message Us" href="https://wa.me/{{$page_property_view->whatsapp_number}}" target="_blank" class="square-button whatsapp-button">
            <i class="fab fa-whatsapp"></i> <!-- Font Awesome WhatsApp icon -->
        </a>
    </div>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>{{$page_property_view->address}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>24/7 Customer Support & Services</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>{{$page_property_view->phone_number}}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    @if($page_property_view->facebook_link) <a class="btn btn-sm-square bg-white text-primary me-1" href="{{$page_property_view->facebook_link}}" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                    @if($page_property_view->twitter_link) <a class="btn btn-sm-square bg-white text-primary me-1" href="{{$page_property_view->twitter_link}}" target="_blank"><i class="fab fa-twitter"></i></a> @endif
                    @if($page_property_view->whatsapp_number) <a class="btn btn-sm-square bg-white text-primary me-1" href="https://wa.me/{{$page_property_view->whatsapp_number}}" target="_blank" ><i class="fab fa-whatsapp"></i></a> @endif
                    @if($page_property_view->instagram_link) <a class="btn btn-sm-square bg-white text-primary me-0" href="{{$page_property_view->instagram_link}}" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->





    <!-- ======= Main page ==== -->

    @yield('main')

    <!-- End #main -->









    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s"  style="background: linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, .9)), url('{{ (!empty($page_property_view->slider_images[0]->image)) ? asset('page_assets/img/' . $page_property_view->slider_images[0]->image) : asset('upload/No_Image_Available.jpg') }}') center center no-repeat; background-size: cover;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$page_property_view->address}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$page_property_view->phone_number}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$page_property_view->email}}</p>
                    <div class="d-flex pt-2">
                        @if($page_property_view->twitter_link) <a class="btn btn-outline-light btn-social" href="{{$page_property_view->twitter_link}}" target="_blank" ><i class="fab fa-twitter"></i></a> @endif
                        @if($page_property_view->facebook_link) <a class="btn btn-outline-light btn-social" href="{{$page_property_view->facebook_link}}" target="_blank" ><i class="fab fa-facebook-f"></i></a> @endif
                        @if($page_property_view->instagram_link) <a class="btn btn-outline-light btn-social" href="{{$page_property_view->instagram_link}}" target="_blank" ><i class="fab fa-instagram"></i></a> @endif
                        @if($page_property_view->whatsapp_number) <a class="btn btn-outline-light btn-social" href="https://wa.me/{{$page_property_view->whatsapp_number}}" target="_blank" ><i class="fab fa-whatsapp"></i></a> @endif
                        @if($page_property_view->youtube_link) <a class="btn btn-outline-light btn-social" href="{{$page_property_view->youtube_link}}" target="_blank" ><i class="fab fa-youtube"></i></a> @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    {{-- <h6 class="text-light">Monday - Friday:</h6> --}}
                    <p class="mb-4">{{ $page_property_view->opening_hours1 }}</p>
                    {{-- <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p> --}}
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="{{ route('balloons') }}">Balloons</a>
                    <a class="btn btn-link" href="{{ route('occasions') }}">Occasions</a>
                    <a class="btn btn-link" href="{{ route('seasonal.holidays') }}">Seasonal & Holidays</a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ route('index') }}">Kanak Decoration</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://myfo.live/">EnumTech</a>
                        <!-- <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('page_assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('page_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('page_assets/js/main.js') }}"></script>




</body>

</html>



