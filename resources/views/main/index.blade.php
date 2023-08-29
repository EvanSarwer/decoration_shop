@extends('main.main')
@section('main')



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="bi bi-balloon"></i></i>Kanak Decoration</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('balloons') }}" class="nav-item nav-link">Balloons</a>
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


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('page_assets/img/carousel-bg-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h3 class="text-white text-uppercase animated slideInDown">IT'S NOT A PARTY WITHOUT</h3>
                                    <h1 class="display-3 text-white mb-4 animated slideInDown">BALLOONS!</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">20,000+ BALLOON DESIGN IN STOCK<i class="fa fa-arrow-right ms-3"></i></a>
                                    <h6 class="text-white text-uppercase mb-3 pt-3 animated slideInDown">Kanak Decoration offers one of the largest </br> balloon selections in the world</h6>
                                </div>
                                <!-- <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="{{ asset('page_assets/img/carousel-1.png') }}" alt="">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('page_assets/img/carousel-bg-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h3 class="text-white text-uppercase animated slideInDown">IT'S NOT A PARTY WITHOUT</h3>
                                    <h1 class="display-3 text-white mb-4 animated slideInDown">BALLOONS!</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">20,000+ BALLOON DESIGN IN STOCK<i class="fa fa-arrow-right ms-3"></i></a>
                                    <h6 class="text-white text-uppercase mb-3 pt-3 animated slideInDown">Kanak Decoration offers one of the largest </br> balloon selections in the world</h6>
                                <!-- </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="{{ asset('page_assets/img/carousel-2.png') }}" alt="">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h1 class="">Recent Products</h1>
                <h6 class="text-primary text-uppercase mb-5">Love With Our Wide Selection Of Foil Balloons</h6>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">

                @if (count($recent_balloons) > 0)
                  @foreach($recent_balloons as $key => $balloon)
                    <div class="testimonial-item ">
                        <img class="bg-light mx-auto mb-1" src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 400px; height: 400px;">
                        <!-- <h5 class="mb-0">Client Name</h5>
                        <p>Profession</p> -->
                        <div class="testimonial-text bg-light p-2">
                          <a href="{{ route('single.balloon', $balloon->id) }}" ><h4 class="pl-3">{{ $balloon->title }}</h4></a>
                          <div class="row">
                            <div class="col-6">

                              @if ($balloon->offer_percent > 0)
                                <h5>
                                  ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                                  <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                                </h5>
                              @else
                                <h5>${{ number_format($balloon->price, 2) }} </h5>
                              @endif

                              @if($balloon->quantity > 0)
                                <p class="mb-0">In Stock, {{$balloon->quantity}} Units</p>
                              @else
                                <p class="mb-0">Out of Stock</p>
                              @endif
                            </div>

                            <div class="col-6">
                              @if ($balloon->offer_percent > 0)
                                <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                              @endif
                              <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                style="border-radius: 50px; transition: background-color 0.3s; position: relative; overflow: hidden; background: linear-gradient(135deg, #ff9800, #ff5722); border: none; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);">
                                  <span style="display: inline-flex; align-items: center; color: white;">
                                      <i class="bi bi-whatsapp me-2" style="font-size: 25px;"></i> <!-- WhatsApp Icon -->
                                      <div class="pb-2">Book Now</div>
                                  </span>
                              </a>
                            </div>
                          </div>
                        
                        </div>
                    </div>

                  @endforeach
                @else
                  <div class="testimonial-item ">
                      <img class="bg-light mx-auto mb-1" src="{{ url('upload/No_Image_Available.jpg') }}" style="width: 400px; height: 400px;">
                    
                      <div class="testimonial-text bg-light p-2">
                        <h4 class="pl-3">Not Available</h4>
                        <div class="row">
                          <div class="col-6">
                              <h5>$0.00</h5>
                              <p class="mb-0"></p>
                          </div>
                          <div class="col-6">
                            <a href="#" class="btn btn-warning btn-sm disabled d-flex align-items-center justify-content-center"
                              style="border-radius: 50px; transition: background-color 0.3s; position: relative; overflow: hidden; background: linear-gradient(135deg, #ff9800, #ff5722); border: none; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);">
                                <span style="display: inline-flex; align-items: center; color: white;">
                                    <i class="bi bi-whatsapp me-2" style="font-size: 25px;"></i> <!-- WhatsApp Icon -->
                                    <div class="pb-2">Book Now</div>
                                </span>
                            </a>
                          </div>
                        </div>
                      </div>
                  </div>
                @endif
                
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('page_assets/img/about.jpg') }}" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">Explore Party <span class="text-primary">Balloons</span> For Every Milestone</h1>
                    <p class="mb-4">holiday, and style. Find all your latex, foil, and helium balloons. We can deliver as fast as same day!</p>
                    <div class="row g-2 mb-1 pb-1">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>Wide Selection Of Foil Balloons</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>Latex Balloons For Valentine's Day</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-info"><i class="bi bi-check2-circle"></i></span>
                                </div>
                                <div class="ps-3 pt-3">
                                    <h6>Best Options In Balloons Themes</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="tel:+02101283492" class="btn btn-primary rounded" style="border-radius: 100px;"><div class="wow fadeInUp" style="border-radius: 100px;" data-wow-delay="0.3s">
                    <div class="d-flex py-3 px-2" style="border-radius: 100px;">
                        <i><svg fill="#000000" height="100px" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.726 490.726" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M261.526,475.713c1.7,0.1,3.4,0.2,5,0.2c18.5,0,34-6.7,46.1-19.9c0.1-0.1,0.3-0.3,0.4-0.4c4-4.8,8.6-9.2,13.5-13.9 c3.4-3.2,6.8-6.6,10.1-10.1c16.4-17.1,16.3-39.6-0.2-56.1l-42.7-42.7c-7.9-8.3-17.5-12.6-27.6-12.6c-10,0-19.7,4.3-27.8,12.5 l-23.6,23.6c-1.6-0.9-3.3-1.7-4.9-2.5c-2.7-1.4-5.3-2.7-7.5-4.1c-22.9-14.5-43.7-33.5-63.5-57.9c-9.4-11.8-15.8-21.9-20.3-31.6 c6-5.6,11.7-11.3,17.2-16.9c2.2-2.2,4.4-4.4,6.6-6.6c8.4-8.4,12.8-18.1,12.8-28.1s-4.4-19.7-12.8-28.1l-21.2-21.2 c-2.4-2.4-4.8-4.9-7.2-7.3c-4.7-4.9-9.7-9.9-14.5-14.4c-7.9-7.9-17.4-12.1-27.4-12.1c-9.9,0-19.5,4.1-27.8,12.1l-26.6,26.6 c-10.2,10.3-16.1,22.8-17.3,37.2c-1.9,23,4.9,44.4,10.1,58.5c12.6,34.1,31.6,65.8,59.7,99.7c34.2,40.8,75.4,73.1,122.4,95.8 C210.426,463.913,234.526,474.013,261.526,475.713z M88.826,343.813c-26.3-31.6-43.9-61-55.6-92.5c-7.1-19.1-9.8-33.9-8.6-47.9 c0.7-8.6,4.1-15.8,10.5-22.2l26.2-26.2c2.4-2.3,6.2-5.1,10.7-5.1c4.3,0,7.9,2.7,10.4,5.2c4.7,4.4,9.2,9,14,13.9 c2.4,2.5,4.9,5,7.4,7.5l21.2,21.2c2.6,2.6,5.6,6.5,5.6,10.8s-3.1,8.2-5.6,10.8c-2.3,2.3-4.5,4.5-6.7,6.8 c-6.5,6.6-12.7,12.9-19.4,18.9c-0.2,0.2-0.3,0.3-0.5,0.5c-7.3,7.3-6,14.6-4.4,19.4c0.1,0.3,0.2,0.5,0.3,0.8 c5.6,13.5,13.4,26.3,25.5,41.5c21.6,26.6,44.3,47.3,69.4,63.2c3.2,2.1,6.5,3.7,9.7,5.3c2.7,1.4,5.3,2.7,7.5,4.1 c0.4,0.2,0.7,0.4,1.1,0.6c7.7,3.8,15.3,2.5,21.5-3.8l26.6-26.6c2.4-2.4,6.2-5.3,10.5-5.3c4.2,0,7.7,2.8,10.1,5.3l42.9,42.9 c7.1,7.1,7.1,14.2-0.3,21.9c-2.9,3.1-6.1,6.1-9.4,9.3c-5,4.9-10.3,9.9-15.1,15.6c-7.5,8-16.3,11.7-27.9,11.7c-1.2,0-2.3,0-3.5-0.1 c-22.8-1.5-44.1-10.4-60-18C159.226,412.113,120.826,382.013,88.826,343.813z"></path> <path d="M295.426,283.013c13.4,3.3,27.2,5,41.2,5c85,0,154.1-61.3,154.1-136.6s-69.1-136.6-154.1-136.6s-154.1,61.2-154.1,136.6 c0,28.9,10.4,57.1,29.4,80.3c-3.6,6.9-8.6,12.5-14.8,16.5c-5.7,3.8-8.4,10.5-6.9,17.1s6.8,11.4,13.5,12.4 c13.1,1.8,38.5,2.8,62.2-11.5c5.8-3.5,7.7-11,4.2-16.8c-3.5-5.8-11-7.7-16.8-4.2c-8.8,5.3-18.2,7.7-26.5,8.6 c4.6-5.8,8.2-12.5,11-20c1.6-4.3,0.6-9.2-2.5-12.6c-18.5-20.1-28.3-44.2-28.3-69.9c0-61.8,58.1-112.1,129.6-112.1 s129.6,50.3,129.6,112.1s-58.1,112.1-129.6,112.1c-12,0-23.9-1.4-35.4-4.2c-6.5-1.6-13.2,2.4-14.8,9 C284.826,274.813,288.826,281.413,295.426,283.013z"></path> <circle cx="336.626" cy="151.413" r="13"></circle> <circle cx="382.926" cy="151.413" r="13"></circle> <circle cx="290.326" cy="151.413" r="13"></circle> </g> </g> </g></svg></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Have Questions? Call Us</h5>
                            <h3 class="mb-3 text-warning">+021 01283492</h3>
                            <p>Open monday to Friday 9:30 AM to 6:00 PM</p>
                        </div>
                    </div>
                </div></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i><svg height="70" viewBox="0 0 64 64" width="70" xmlns="http://www.w3.org/2000/svg"><g fill="rgb(0,0,0)"><path d="m31.75452 16.74432a1.19223 1.19223 0 0 0 -1.16877 1.02985c-12.514.102-17.71691 16.48578-7.81274 24.03961 4.6283 3.37836 12.12848 3.51471 17.0329.63837 4.59118-2.93573 7.05511-9.75379 6.30054-15.02405-1.00464-7.0166-7.78254-10.53644-14.35193-10.68378zm8.277 22.1283c-3.4386 3.61871-9.97846 4.46954-14.40021 2.32526-10.57443-5.88588-6.39504-21.25122 5.33169-22.23407 4.51148 1.09 10.59607 2.01422 12.23944 7.25659 1.29249 4.03076-.35454 9.59448-3.17088 12.65222z"></path><path d="m59.35413 25.232a2.67286 2.67286 0 0 0 -2.25354-.51226 9.6108 9.6108 0 0 0 -.68964-3.4751c-.55634-1.24243-2.42554-2.82807-3.68475-1.70783a.854.854 0 0 0 -.147-.0783c.49225-7.01587-8.458-12.68958-14.46521-14.20673-10.86466-3.01887-23.84568 3.13463-27.44468 13.98314-2.853-.316-3.77 3.19074-3.70953 5.49762-6.20551-.68286-7.12268 12.81568-.34052 12.037.0907 2.71124 1.43311 6.31256 4.56348 6.498a9.45778 9.45778 0 0 0 7.10284 8.69067 4.3963 4.3963 0 0 0 7.46979 2.23c1.96509-1.87561 1.80921-5.71954-1.017-6.66107-.87811-.27429-2.09533-.5498-2.85284.10858a.8224.8224 0 0 0 -.81818-.20892 4.24966 4.24966 0 0 0 -2.45257 2.16876 8.381 8.381 0 0 1 -5.483-6.86749c4.37481-2.94607 3.00732-9.21837 3.35559-13.76007.16186-3.36328.1889-9.26386-4.19-9.66815a23.303 23.303 0 0 1 10.98943-10.82017c.9809 2.87854 4.85852 2.57019 7.34418 2.595 2.31915-.11866 9.74713-.008 10.4281-2.61328 4.55042 2.13287 9.23841 5.75427 10.46271 10.84033-3.48773.3919-4.157 4.94049-4.04193 7.828.27795 4.31451-.47833 8.91754 1.13043 13.02 3.18414 6.13452 8.7721 2.303 8.75867-3.38245 5.91028.52372 5.96283-8.99995 1.98517-11.53528zm-52.75037 9.5122c-3.25407-.21088-3.20334-4.7661-1.91409-6.92028a3.32956 3.32956 0 0 1 1.61819-1.5138 1.139 1.139 0 0 0 .51044-.315.45518.45518 0 0 0 .10931-.01512c-.09961 2.92332-.22784 5.84-.32385 8.7642zm15.31604 14.1788c.73547.62983 2.13715.18915 2.79974.8172 1.50223 2.32754-1.7061 4.734-3.5308 3.27463a2.36067 2.36067 0 0 1 .73106-4.09183zm-7.75116-18.04116c-.12836 2.7741.77722 9.36865-2.73309 10.23565-1.67066.18305-2.41577-2.22033-2.61469-3.4834-.40857-4.19458.06018-8.47174-.01776-12.69256.02594-1.67475.01392-4.23767 2.24652-4.13446a.79556.79556 0 0 0 .38922.24652c3.69593 1.03253 2.74416 7.03094 2.7298 9.82825zm24.46636-22.74573c-3.1629 1.96985-6.96588 1.59253-10.507 1.26074-1.24615-.14075-2.72626-.29126-3.44372-1.5094a21.34442 21.34442 0 0 1 14.61172-.12427c-.20683.11109-.41532.23853-.661.37293zm16.54413 29.498c-.90412 5.33338-4.71356 4.08167-5.19525-.60492a49.49947 49.49947 0 0 1 -.15247-6.14733c-.01434-2.79621-.96545-8.7959 2.7298-9.82825a.795.795 0 0 0 .389-.24652c2.233-.10333 2.22082 2.46387 2.24646 4.13446-.07767 4.22074.39122 8.49839-.01753 12.69254zm4.09155-3.78344a2.30717 2.30717 0 0 1 -1.87958.88916c-.03344-2.93647-.27978-5.79822-.26172-8.74762 2.92494 1.11466 3.90541 5.37492 2.14131 7.85844z"></path><path d="m36.0592 35.28558a6.02411 6.02411 0 0 1 -6.71038 1.6745c-.76038-.41821-1.53778-.7962-2.32337-1.15857-1.121-.28936-.15967 1.54737.16327 1.90589a6.59968 6.59968 0 0 0 7.96021.94665 6.322 6.322 0 0 0 2.26617-2.57586.78582.78582 0 0 0 -1.3559-.79261z"></path><path d="m34.31537 49.10419a.79326.79326 0 0 0 -.73462-.55927c-.79028-.26526-6.25073 1.38812-4.294 2.46991.97564.27362 5.424-.45083 5.02862-1.91064z"></path><path d="m34.07129 53.60315a13.59336 13.59336 0 0 0 -4.19849-.49939.87182.87182 0 0 0 -.23047 1.70343c1.33844.18152 3.09223.69763 4.429.36859a.82167.82167 0 0 0 -.00004-1.57263z"></path><path d="m30.43817 57.13177c-.77832-.352-1.31518-1.22729-2.17578-1.33343a1.08619 1.08619 0 0 0 -.76239 1.84066 4.6034 4.6034 0 0 0 2.90991 1.86834c1.78717-.11769 1.15686-1.7588.02826-2.37557z"></path></g></svg></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Support 24/7</h5>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i><svg height="70" version="1.1" width="70" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                    <path d="M76.776,277.958c12.542-3.531,25.023-7.27,37.448-11.189c24.507-7.728,48.79-16.154,72.896-25.047
                      c52.903-19.517,104.956-41.294,156.67-63.75c1.395,5.216,2.889,10.396,4.741,15.409c3.085,8.348,10.204,15.733,19.92,13.438
                      c10.313-2.435,16.884-14.034,23.26-21.567c7.579-8.953,15.263-17.798,22.96-26.649c7.682-8.834,15.375-17.659,23.073-26.479
                      c7.573-8.677,16.061-17.159,22.792-26.502c6.416-8.906,3.581-18.509-3.357-26.101c-6.892-7.543-14.674-14.444-22.624-20.843
                      c-16.365-13.171-34.002-24.618-52.62-34.34c-9.163-4.784-18.535-9.144-28.052-13.174c-9.161-3.879-18.801-8.581-28.581-10.612
                      c-9.756-2.025-20.39,1.417-23.567,11.698c-1.626,5.263-0.479,10.709,0.605,15.959c1.265,6.126,2.651,12.229,4.129,18.307
                      c2.112,8.684,4.448,17.312,6.971,25.884c-50.848,12.518-100.737,29.209-150.404,45.708
                      c-25.057,8.323-50.059,16.812-75.003,25.467c-12.648,4.388-25.246,8.903-37.829,13.473c-9.806,3.562-19.789,7.139-28.335,13.28
                      c-8.377,6.019-14.769,14.447-16.525,24.797c-1.835,10.802,0.255,22.423,3.482,32.761c3.62,11.598,8.27,22.984,14.006,33.697
                      c4.617,8.624,9.879,18.069,19.91,21.069C53.79,285.957,66.213,280.933,76.776,277.958z M319.084,16.263
                      c7.689,1.109,15.192,4.634,22.363,7.486c39.584,15.736,73.002,38.618,104.938,66.398c1.891,1.645,3.946,3.65,3.837,6.154
                      c-0.074,1.71-1.166,3.185-2.213,4.539c-24.056,31.073-47.615,64.486-77.603,90.236c-1.424,1.223-3.232,2.503-5.019,1.926
                      c-1.624-0.525-2.397-2.332-2.969-3.941c-4.334-12.184-8.574-24.414-12.496-36.737c-7.012-21.928-13.894-43.912-20.584-65.94
                      c-4.511-14.856-8.295-29.971-11.879-45.114c-0.506-2.725-0.998-5.453-1.465-8.185c-0.746-4.367-1.964-9.079-1.939-13.529
                      C314.078,15.588,315.602,15.76,319.084,16.263z M42.888,271.742c-1.453-0.691-2.742-1.627-3.908-2.718
                      c-2.155-2.02-3.886-4.574-5.447-7.112c-7.276-11.827-12.632-24.834-15.795-38.355c-2.211-9.457-3.226-19.915,1.428-28.441
                      c5.394-9.881,16.816-14.536,27.366-18.462c37.716-14.033,75.388-28.173,113.264-41.758
                      c51.898-18.614,104.113-36.25,155.822-55.398c9.018,27.47,17.048,55.263,24.072,83.309
                      c-91.237,39.803-182.751,79.708-278.149,108.121C55.432,272.748,48.645,274.478,42.888,271.742z"></path>
                    <path d="M503.173,284.113c-3.62-11.598-8.27-22.984-14.006-33.697c-4.617-8.624-9.879-18.069-19.91-21.069
                      c-11.046-3.303-23.468,1.721-34.03,4.696c-12.542,3.531-25.023,7.27-37.448,11.189c-24.507,7.728-48.79,16.154-72.896,25.047
                      c-52.903,19.517-104.956,41.294-156.67,63.75c-1.395-5.216-2.889-10.396-4.741-15.409c-3.085-8.348-10.204-15.733-19.92-13.438
                      c-10.313,2.435-16.884,14.034-23.26,21.567c-7.579,8.953-15.263,17.798-22.96,26.649c-7.682,8.834-15.375,17.658-23.073,26.479
                      c-7.573,8.677-16.061,17.16-22.792,26.502c-6.416,8.906-3.581,18.509,3.357,26.101c6.892,7.543,14.674,14.444,22.624,20.843
                      c16.365,13.171,34.002,24.618,52.62,34.34c9.163,4.784,18.535,9.144,28.052,13.174c9.161,3.879,18.801,8.581,28.581,10.612
                      c9.756,2.025,20.39-1.417,23.567-11.698c1.626-5.263,0.479-10.709-0.605-15.959c-1.266-6.126-2.651-12.229-4.129-18.307
                      c-2.112-8.684-4.448-17.312-6.971-25.884c50.848-12.518,100.737-29.209,150.404-45.708c25.057-8.323,50.059-16.812,75.003-25.467
                      c12.648-4.388,25.246-8.903,37.829-13.473c9.806-3.562,19.789-7.139,28.335-13.28c8.377-6.019,14.769-14.447,16.525-24.797
                      C508.489,306.072,506.4,294.451,503.173,284.113z M196.529,495.731c-1.087,0.65-2.389,0.571-3.656,0.281
                      c-0.471-0.108-0.938-0.245-1.387-0.386c-47.29-14.753-91.086-40.585-126.874-74.837c-1.108-1.062-2.262-2.22-2.595-3.719
                      c-0.495-2.228,0.957-4.378,2.337-6.196c22.939-30.238,46.905-61.693,74.631-87.734c2.099-1.973,5.501-5.609,8.357-3.656
                      c2.451,1.674,3.812,8.031,4.693,10.527c18.256,51.779,35.674,104.789,46.007,158.79
                      C198.517,491.284,198.698,494.435,196.529,495.731z M495.788,304.454c-0.214,4.481-1.176,8.839-3.3,12.803
                      c-4.496,8.39-13.403,13.47-22.352,16.721c-20.112,7.305-40.397,14.21-60.567,21.437c-33.25,11.912-66.5,23.825-99.75,35.737
                      c-36.878,13.213-75.082,24.793-111.036,40.417c-0.143,0.062-2.379,0.878-2.318,1.071c-2.967-9.635-6.174-19.196-9.623-28.671
                      c-4.348-17.701-9.045-35.295-14.076-52.832c-0.202-0.705-0.395-1.418-0.591-2.127c0.018-0.007,0.036-0.013,0.054-0.021
                      c49.821-21.298,99.672-42.551,150.058-62.487c25.196-9.969,50.526-19.611,76.036-28.752c11.564-4.144,23.18-7.99,34.865-11.715
                      c10.428-3.326,21.996-10.289,33.194-6.272c7.652,2.744,12.61,10.082,16.335,17.306c5.1,9.89,8.925,20.436,11.35,31.296
                      C495.236,293.596,496.044,299.112,495.788,304.454z"></path>
              </svg></i>
                        <div class="ps-4">
                            <h5 class="mb-3">8 Days Exchange</h5>
                            <p>Exchange within 6 to 8 working days.at ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i><svg xmlns="http://www.w3.org/2000/svg" height="70" viewBox="0 0 64 64" width="70"><g fill="rgb(0,0,0)"><path d="m53.192 31.59766a14.82091 14.82091 0 0 0 -2.88532.309.87337.87337 0 0 0 -.63666.83618.88262.88262 0 0 0 .63666.83624 14.86968 14.86968 0 0 0 2.88532.309c2.4377.21348 2.43977-2.50521 0-2.29042z"></path><path d="m3.1059 18.44952c5.70275.6695 11.494 1.07947 17.20514 1.37488a9.40607 9.40607 0 0 0 -1.47704 3.19495c-3.52728.16443-7.13256-.12573-10.60424.58386a.68477.68477 0 0 0 0 1.311c3.39831.649 6.89935.26825 10.34436.39276a10.64089 10.64089 0 1 0 19.49212-5.6388c-2.79415-4.1274-9.35224-6.2228-13.5544-2.94117a7.868 7.868 0 0 0 -3.27936 2.00519c-.30725-.87946-1.32318-.87134-2.12256-.95q-3.396-.32392-6.80169-.5315a61.3992 61.3992 0 0 0 -9.20233.21442.49252.49252 0 0 0 0 .98441zm21.98327.20048c.61066.15424 1.228-.23724 1.83045-.31964.62811-.095 1.72717.44867 2.05987-.30542a7.56061 7.56061 0 0 1 6.93305 11.32184c-4.01032 6.67951-13.78009 4.475-15.03473-3.06317a7.08307 7.08307 0 0 1 4.21136-7.63361z"></path><path d="m11.19812 30.2915c-2.24127.27161-4.50763.20765-6.76013.34894-.8728.05481-1.2038 1.48541-.22119 1.63434a31.24751 31.24751 0 0 0 3.40936.45758 26.30667 26.30667 0 0 0 3.44019-.07715c2.31262-.2102 4.63293.10144 6.94506-.08563 1.559-.12616 1.58521-2.55981 0-2.45453-2.26922.15076-4.55169-.09765-6.81329.17645z"></path><path d="m24.52844 28.70752a1.14747 1.14747 0 0 0 .91748-.08441c.62781-.09357 1.23908-.13941 1.8664-.21259a3.61974 3.61974 0 0 0 1.34468-.25012 1.39482 1.39482 0 0 0 .69489-1.24219 42.59241 42.59241 0 0 0 -.29889-5.34491.85784.85784 0 0 0 -.83209-.832.84451.84451 0 0 0 -.832.832 40.37033 40.37033 0 0 0 .17481 5.06617c-.74188.05218-1.53882.13476-2.27136.14752a1.23043 1.23043 0 0 0 -.999.1214.99633.99633 0 0 0 .23508 1.79913z"></path><path d="m61.2132 40.3996a4.07218 4.07218 0 0 0 -2.428-2.436.95152.95152 0 0 0 .9165-.90228c.12891-1.83466.03894-3.68164.11768-5.51868a34.66656 34.66656 0 0 0 .23114-5.27478c-.144-2.22412-2.1778-3.10162-3.81635-4.14734-.64538-.50543-1.16058-1.158-1.77258-1.70123-2.36509-2.09965-5.40391-1.86129-8.31059-1.31938a7.718 7.718 0 0 0 -3.04571 1.05988c-.575-3.74164 1.55328-10.41064-3.976-10.902a32.34238 32.34238 0 0 0 -6.05633-.19452 134.16572 134.16572 0 0 1 -22.59082-.8952c-4.69308-.94523-5.43179 2.71793-4.02676 6.34273a1.40028 1.40028 0 1 0 2.57019-1.08368 7.315 7.315 0 0 1 -.50592-2.70251c.22931-.25641 1.23865-.12335 1.50348-.11255a99.25531 99.25531 0 0 0 16.30963.46021c2.175-.05616 4.3357-.26362 6.5044-.42865 2.42389-.00934 8.28168-1.54938 8.42468 2.12677.31879 3.3966-.36139 6.77349-.387 10.15087a1.01441 1.01441 0 0 0 .47149.8028c-.22607 4.59711-.47668 9.21777-.45343 13.81311-10.92358-.00177-21.81646 1.06952-32.73364.80811.40863-.45649.24292-1.10468.34931-1.66163l-.04126.307c-.00037-.70727.44867-1.46112.09442-2.12781a1.11229 1.11229 0 0 0 -1.50818-.39544 1.2333 1.2333 0 0 0 -.50653.65875 4.97 4.97 0 0 0 -.253 2.87671c-5.24067 1.92535-4.08893 7.618 1.339 7.96838-1.15686 2.53485.00775 6.03363 2.62481 7.06049-2.55938.143-5.26379-.25031-7.74011.47564-2.58716 2.28534 5.68524 1.44281 6.64594 1.60517q10.44635-.00477 20.87884.61621c1.38617.08124 1.38147-2.07532 0-2.15625q-7.43684-.433-14.88843-.51984a11.20866 11.20866 0 0 0 5.74553-6.47386c7.598.17913 15.20959.175 22.79638-.095a5.44261 5.44261 0 0 0 6.66413 6.89863c3.52453-.90174 6.38733-4.41651 7.04114-7.92151 2.91345-.18913 4.90924-2.1074 3.81195-5.06132zm-12.94208-17.12128a8.32563 8.32563 0 0 0 .17377-2.47729 6.04769 6.04769 0 0 1 4.655.98 22.85409 22.85409 0 0 0 2.955 2.42285c1.01843.582 2.06763 1.01208 2.20654 2.31872a15.21393 15.21393 0 0 1 -.01513 2.16706c-3.96255-.17257-10.78066.50634-9.97518-5.41134zm-5.4129 14.11462c.369-4.5924.29339-9.22.633-13.80523.16889-1.86261 1.80994-2.23377 3.385-2.52515-1.77258 5.15387 1.12518 9.25293 6.51856 9.54022 1.60083.1286 3.207-.01953 4.806.152-.02747 2.10736-.35858 4.20069-.39765 6.30646a.86338.86338 0 0 0 .24817.65216c-2.07214-.57617-4.64129-.33765-6.47717-.34351-2.91242-.00921-5.82813.05652-8.74286.12421a.98712.98712 0 0 0 .02695-.10116zm-25.04242 9.6482c-.88709 1.614-2.176 3.3786-4.0047 3.97723-4.2367 1.36426-5.94-3.41553-2.94062-6.04785a8.99472 8.99472 0 0 1 5.5166-1.87781.92571.92571 0 0 0 .51508.34467c.27783.26532.60022.28393.88721.481 1.18475.55043.56555 2.17238.02643 3.12276zm36.25476 0c-.88709 1.614-2.176 3.3786-4.0047 3.97723-4.2367 1.36426-5.94-3.41553-2.94062-6.04785a8.99473 8.99473 0 0 1 5.51661-1.87781.92565.92565 0 0 0 .51507.34467c.27783.26532.60022.28393.88721.481 1.18475.55043.56555 2.17238.02643 3.12276zm3.15075-3.46076c-.45056-1.58148-2.48114-3.20349-4.04089-2.14251a8.54816 8.54816 0 0 0 -8.48956 3.06878c-7.84174.28626-15.69617.18421-23.53791.03681-.022-1.94013-2.29913-4.34034-4.22729-3.10559a8.56359 8.56359 0 0 0 -8.38092 2.92889 6.95144 6.95144 0 0 1 -2.89307-.49469c-2.08685-.96741-1.33832-3.17.38062-4.078a.93728.93728 0 0 0 .97131.685c4.00507-.10247 7.97235-.61126 11.9812-.49176 3.81189.11371 7.6706-.0075 11.48206-.11877 9.37677-.15173 18.82953-.82654 28.16894-.19818 3.90186 1.21502 1.32758 3.55004-1.41449 3.91002z"></path><path d="m54.46948 53.7821c-5.52325.096-11.17138-.6795-16.65619.05665a.72045.72045 0 0 0 0 1.3789c5.49335.79907 11.11328.45441 16.65619.71619.76148.01678 1.40821.12561 1.98145-.46784a.83921.83921 0 0 0 0-1.16009c-.54425-.60864-1.2298-.51044-1.98145-.52381z"></path><path d="m61.49487 53.52026c-.79254-.14685-1.65033.32325-2.49023.21021a.78131.78131 0 0 0 -.77344.77362c.16565 1.382 2.28058.58874 3.17267.447a.76313.76313 0 0 0 .091-1.43083z"></path></g></svg></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Free Shipping</h5>
                            <p>Free Shipping on All World. above $250</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- ======= Speakers Section ======= -->
    <!-- <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header text-center">
          <h1>Event Speakers</h1>
          <p>Here are some of our speakers</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Brenden Legros</a></h3>
                <p>Quas alias incidunt</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Hubert Hirthe</a></h3>
                <p>Consequuntur odio aut</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Cole Emmerich</a></h3>
                <p>Fugiat laborum et</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 4" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Jack Christiansen</a></h3>
                <p>Debitis iure vero</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 5" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Alejandrin Littel</a></h3>
                <p>Qui molestiae natus</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
              <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Speaker 6" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Willow Trantow</a></h3>
                <p>Non autem dicta</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section> -->
    <!-- End Speakers Section -->


    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <!-- <div class="section-header text-center">
          <h1>Event Speakers</h1>
          <p>Here are some of our speakers</p>
        </div> -->

        <div class="row">
          <div class="col-lg-4 ">


            <div class="speaker" style="width: 340px;" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ (!empty($holidays[0]->image1)) ? url('upload/holiday_images/'.$holidays[0]->image1) : url('upload/No_Image_Available.jpg') }}" alt="Speaker 1" class="img-fluid" style="width: 340px; height: 300px; object-fit: cover;">
              <div class="details">
                  <h3><a href="{{ route('seasonal.holidays') }}">{{$holidays[0]->title ?? 'Not Available'}}</a></h3>
                  <p>See Our Selection</p>
                  <div class="social">
                  @if(count($holidays)>0)
                      <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($holidays[0]->title) }}%0APrice%3A%20%24{{ ($holidays[0]->offer_percent > 0) ? (number_format($holidays[0]->price - ($holidays[0]->price * ($holidays[0]->offer_percent / 100)), 2)) : (number_format($holidays[0]->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('seasonal.holidays')) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                    @endif
                  </div>
              </div>
            </div>

            <div class="speaker" style="width: 340px;" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ (!empty($holidays[1]->image1)) ? url('upload/holiday_images/'.$holidays[1]->image1) : url('upload/No_Image_Available.jpg') }}" alt="Speaker 1" class="img-fluid" style="width: 340px; height: 300px; object-fit: cover;">
              <div class="details">
                  <h3><a href="{{ route('seasonal.holidays') }}">{{$holidays[1]->title ?? 'Not Available'}}</a></h3>
                  <p>See Our Selection</p>
                  <div class="social">
                  @if(count($holidays)>1)
                      <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($holidays[1]->title) }}%0APrice%3A%20%24{{ ($holidays[1]->offer_percent > 0) ? (number_format($holidays[1]->price - ($holidays[1]->price * ($holidays[1]->offer_percent / 100)), 2)) : (number_format($holidays[1]->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('seasonal.holidays')) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                  @endif
                    </div>
              </div>
            </div>


          </div>

          <div class="col-lg-4 col-md-6">
            
          <div class="holiday-text-style" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            </br></br></br></br></br></br>
          
            <h1 class="mt-4">Holiday Balloons</h1>
            <p>holiday, and style. Find all your latex, foil, and helium balloons. We can deliver as fast as same day!</p>
            <a href="{{ route('seasonal.holidays') }}" class="btn rounded-pill" style="margin-top: 10px; background-color: deeppink; border-color: deeppink; transition: background-color 0.3s; position: relative; overflow: hidden; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);">
                <span style="position: relative; display: inline-block; padding: 10px 20px; color: white; z-index: 2;">Shop Holiday Balloons</span>
                <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(45deg, #ff6f61, #ffda6b, #4a90e2, #b52b65); z-index: 1; transform: scaleX(0); transform-origin: 0 50%; transition: transform 0.3s;"></span>
            </a>

            <i class="fa-solid fa-location-dot" style="margin-top: 10px;"></i>
            <span style="margin-top: 5px;">547 S Mason Road, New town Street 2548 United State</span>
          </div>


          </div>

          <div class="col-lg-4 col-md-6">

            <div class="speaker" style="width: 340px;" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ (!empty($holidays[2]->image1)) ? url('upload/holiday_images/'.$holidays[2]->image1) : url('upload/No_Image_Available.jpg') }}" alt="Speaker 1" class="img-fluid" style="width: 340px; height: 300px; object-fit: cover;">
              <div class="details">
                  <h3><a href="{{ route('seasonal.holidays') }}">{{$holidays[2]->title ?? 'Not Available'}}</a></h3>
                  <p>See Our Selection</p>
                  <div class="social">
                  @if(count($holidays)>2)
                      <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($holidays[2]->title) }}%0APrice%3A%20%24{{ ($holidays[2]->offer_percent > 0) ? (number_format($holidays[2]->price - ($holidays[2]->price * ($holidays[2]->offer_percent / 100)), 2)) : (number_format($holidays[2]->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('seasonal.holidays')) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                  @endif
                    </div>
              </div>
            </div>

            <div class="speaker" style="width: 340px;" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ (!empty($holidays[3]->image1)) ? url('upload/holiday_images/'.$holidays[3]->image1) : url('upload/No_Image_Available.jpg') }}" alt="Speaker 1" class="img-fluid" style="width: 340px; height: 300px; object-fit: cover;">
              <div class="details">
                  <h3><a href="{{ route('seasonal.holidays') }}">{{$holidays[3]->title ?? 'Not Available'}}</a></h3>
                  <p>See Our Selection</p>
                  <div class="social">
                  @if(count($holidays)>3)
                      <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($holidays[3]->title) }}%0APrice%3A%20%24{{ ($holidays[3]->offer_percent > 0) ? (number_format($holidays[3]->price - ($holidays[3]->price * ($holidays[3]->offer_percent / 100)), 2)) : (number_format($holidays[3]->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('seasonal.holidays')) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                  @endif
                    </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>

    </section><!-- End Speakers Section -->


    <!-- ======= Hotels Section ======= -->
    <!-- <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Hotels</h2>
          <p>Her are some nearby hotels</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 1</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.4 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 2</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill-half-full"></i>
              </div>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>


          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>


          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{ asset('page_assets/img/about.jpg') }}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>


        </div>
      </div>

    </section> -->
    <!-- End Hotels Section -->
   
    
    

    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header text-center">
            <h1>Party Decorations</h1>
        </div>

        <ul class="nav nav-tabs pt-4" role="tablist" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item pt-1">
            <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">{{$balloonsByCategory[0]["categoryName"] ?? 'Not Available'}}</a>
          </li>
          <li class="nav-item pt-1">
            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">{{$balloonsByCategory[1]["categoryName"] ?? 'Not Available'}}</a>
          </li>
          <li class="nav-item pt-1">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">{{$balloonsByCategory[2]["categoryName"] ?? 'Not Available'}}</a>
          </li>
          <li class="nav-item pt-1">
            <a class="nav-link" href="#day-4" role="tab" data-bs-toggle="tab">{{$balloonsByCategory[3]["categoryName"] ?? 'Not Available'}}</a>
          </li>
          <li class="nav-item pt-1">
            <a class="nav-link" href="#day-5" role="tab" data-bs-toggle="tab">{{$balloonsByCategory[4]["categoryName"] ?? 'Not Available'}}</a>
          </li>
        </ul>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <section id="hotels" class="section-with-bg">

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                  @if( count($balloonsByCategory) > 0 && count($balloonsByCategory[0]["balloonList"]) > 0)
                    @foreach($balloonsByCategory[0]["balloonList"] as $key => $balloon)

                      <div class="col-lg-4 col-md-6">
                        <div class="hotel">
                          <div class="hotel-img">
                            <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="Hotel 1" class="img-fluid">
                          </div>
                          <h3><a href="{{ route('single.balloon', $balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                          <p style="font-size: 20px;">
                            @if ($balloon->offer_percent > 0)
                              <span>
                                ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                                <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                              </span> </br>
                              <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                            @else
                              ${{ number_format($balloon->price, 2) }}
                            @endif
                          </p>
                          <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
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

            </section>

          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <section id="hotels" class="section-with-bg">

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                @if( count($balloonsByCategory) > 1 && count($balloonsByCategory[1]["balloonList"]) > 0)
                  @foreach($balloonsByCategory[1]["balloonList"] as $key => $balloon)

                    <div class="col-lg-4 col-md-6">
                      <div class="hotel">
                        <div class="hotel-img">
                          <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="Hotel 1" class="img-fluid">
                        </div>
                        <h3><a href="{{ route('single.balloon', $balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                        <p style="font-size: 20px;">
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($balloon->price, 2) }}
                          @endif
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
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

            </section>

          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

            <section id="hotels" class="section-with-bg">

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                @if(count($balloonsByCategory) > 2 && count($balloonsByCategory[2]["balloonList"]) > 0)
                  @foreach($balloonsByCategory[2]["balloonList"] as $key => $balloon)

                    <div class="col-lg-4 col-md-6">
                      <div class="hotel">
                        <div class="hotel-img">
                          <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="Hotel 1" class="img-fluid">
                        </div>
                        <h3><a href="{{ route('single.balloon', $balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                        <p style="font-size: 20px;">
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($balloon->price, 2) }}
                          @endif
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
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

            </section>

          </div>
          <!-- End Schdule Day 3 -->

          <!-- Schdule Day 4 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-4">

            <section id="hotels" class="section-with-bg">

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                @if(count($balloonsByCategory) > 3 && count($balloonsByCategory[3]["balloonList"]) > 0)
                  @foreach($balloonsByCategory[3]["balloonList"] as $key => $balloon)

                    <div class="col-lg-4 col-md-6">
                      <div class="hotel">
                        <div class="hotel-img">
                          <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="Hotel 1" class="img-fluid">
                        </div>
                        <h3><a href="{{ route('single.balloon', $balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                        <p style="font-size: 20px;">
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($balloon->price, 2) }}
                          @endif
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
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

            </section>

          </div>
          <!-- End Schdule Day 4 -->

          <!-- Schdule Day 5 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-5">

            <section id="hotels" class="section-with-bg">

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                @if( count($balloonsByCategory) > 4 &&  count($balloonsByCategory[4]["balloonList"]) > 0)
                  @foreach($balloonsByCategory[4]["balloonList"] as $key => $balloon)

                    <div class="col-lg-4 col-md-6">
                      <div class="hotel">
                        <div class="hotel-img">
                          <img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" style="width: 300px; max-height: 300px; min-height: 300px; object-fit: cover;" alt="Hotel 1" class="img-fluid">
                        </div>
                        <h3><a href="{{ route('single.balloon',$balloon->id) }}">{{$balloon->title ?? 'Not Available'}}</a></h3>
                        <p style="font-size: 20px;">
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($balloon->price, 2) }}
                          @endif
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($balloon->title) }}%0APrice%3A%20%24{{ ($balloon->offer_percent > 0) ? (number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2)) : (number_format($balloon->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.balloon', $balloon->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
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

            </section>

          </div>
          <!-- End Schdule Day 5 -->


        </div>

      </div>

    </section><!-- End Schedule Section -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Years Experience</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Expert Technicians</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Satisfied Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Compleate Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="">Popular Occasion Themes</h1>
                <h6 class="text-primary text-uppercase mb-5">whats trending at bargain balloons themes</h6>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav w-100 nav-pills me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-3 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <!-- <i class="fa fa-car-side fa-2x me-3"></i> -->
                            <i class='fas fa-heartbeat fa-2x me-3' style='font-size:40px;'></i>
                            <h4 class="m-0">Love Theme</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-3" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <i class='fas fa-birthday-cake fa-2x me-3' style='font-size:40px'></i>
                            <h4 class="m-0">Birthday Theme</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-3" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <i class="fa fa-venus-mars fa-2x me-3" style="font-size:40px;"></i>
                            <h4 class="m-0">Gender Reveal</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <i class="fa fa-map-pin fa-2x me-3" style="font-size:40px;"></i>
                            <h4 class="m-0">Bubble Theme</h4>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($occassion_love_theme->image1)) ? url('upload/occasion_images/'.$occassion_love_theme->image1) : url('upload/No_Image_Available.jpg') }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h6>Ready Time <span style="color: deepPink;">– {{$occassion_love_theme->ready_time  ?? 'Not available'}}</span></h6>
                                  <a href="{{ route('single.occasion', $occassion_love_theme->id) }}" ><h2 class="mb-3">{{$occassion_love_theme->title  ?? 'Not available'}}</h2></a>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_love_theme->text1 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_love_theme->text2 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_love_theme->text3 ?? 'Not available'}}</p>
                                  <small>Starting From: </small>
                                  @if($occassion_love_theme)
                                    @if ($occassion_love_theme->offer_percent > 0)
                                      <h3>
                                        ${{ number_format($occassion_love_theme->price - ($occassion_love_theme->price * ($occassion_love_theme->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ${{ number_format($occassion_love_theme->price, 2) }}</small>
                                        <span class="badge text-danger">{{ $occassion_love_theme->offer_percent }}% Offer</span>
                                      </h3>
                                    @else
                                      <h3>${{ number_format($occassion_love_theme->price, 2) }} </h3>
                                    @endif
                                  
                                    <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($occassion_love_theme->title) }}%0APrice%3A%20%24{{ ($occassion_love_theme->offer_percent > 0) ? (number_format($occassion_love_theme->price - ($occassion_love_theme->price * ($occassion_love_theme->offer_percent / 100)), 2)) : (number_format($occassion_love_theme->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.occasion', $occassion_love_theme->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
                                      style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); margin-top: 20px;">
                                        <span style="display: inline-flex; align-items: center; color: white;">
                                            <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                            Book Now
                                        </span>
                                    </a>
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($occassion_birthday_theme->image1)) ? url('upload/occasion_images/'.$occassion_birthday_theme->image1) : url('upload/No_Image_Available.jpg') }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h6>Ready Time <span style="color: deepPink;">– {{$occassion_birthday_theme->ready_time  ?? 'Not available'}}</span></h6>
                                  <a href="{{ route('single.occasion', $occassion_birthday_theme->id) }}" ><h2 class="mb-3">{{$occassion_birthday_theme->title  ?? 'Not available'}}</h2></a>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_birthday_theme->text1 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_birthday_theme->text2 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_birthday_theme->text3 ?? 'Not available'}}</p>
                                  <small>Starting From: </small>
                                  @if($occassion_birthday_theme)
                                    @if ($occassion_birthday_theme->offer_percent > 0)
                                      <h3>
                                        ${{ number_format($occassion_birthday_theme->price - ($occassion_birthday_theme->price * ($occassion_birthday_theme->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ${{ number_format($occassion_birthday_theme->price, 2) }}</small>
                                        <span class="badge text-danger">{{ $occassion_birthday_theme->offer_percent }}% Offer</span>
                                      </h3>
                                    @else
                                      <h3>${{ number_format($occassion_birthday_theme->price, 2) }} </h3>
                                    @endif
                                  
                                    <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($occassion_birthday_theme->title) }}%0APrice%3A%20%24{{ ($occassion_birthday_theme->offer_percent > 0) ? (number_format($occassion_birthday_theme->price - ($occassion_birthday_theme->price * ($occassion_birthday_theme->offer_percent / 100)), 2)) : (number_format($occassion_birthday_theme->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.occasion', $occassion_birthday_theme->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
                                      style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); margin-top: 20px;">
                                        <span style="display: inline-flex; align-items: center; color: white;">
                                            <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                            Book Now
                                        </span>
                                    </a>
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($occassion_gender_theme->image1)) ? url('upload/occasion_images/'.$occassion_gender_theme->image1) : url('upload/No_Image_Available.jpg') }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h6>Ready Time <span style="color: deepPink;">– {{$occassion_gender_theme->ready_time  ?? 'Not available'}}</span></h6>
                                  <a href="{{ route('single.occasion', $occassion_gender_theme->id) }}" ><h2 class="mb-3">{{$occassion_gender_theme->title  ?? 'Not available'}}</h2></a>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_gender_theme->text1 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_gender_theme->text2 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_gender_theme->text3 ?? 'Not available'}}</p>
                                  <small>Starting From: </small>
                                  @if($occassion_gender_theme)
                                    @if ($occassion_gender_theme->offer_percent > 0)
                                      <h3>
                                        ${{ number_format($occassion_gender_theme->price - ($occassion_gender_theme->price * ($occassion_gender_theme->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ${{ number_format($occassion_gender_theme->price, 2) }}</small>
                                        <span class="badge text-danger">{{ $occassion_gender_theme->offer_percent }}% Offer</span>
                                      </h3>
                                    @else
                                      <h3>${{ number_format($occassion_gender_theme->price, 2) }} </h3>
                                    @endif
                                  
                                    <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($occassion_gender_theme->title) }}%0APrice%3A%20%24{{ ($occassion_gender_theme->offer_percent > 0) ? (number_format($occassion_gender_theme->price - ($occassion_gender_theme->price * ($occassion_gender_theme->offer_percent / 100)), 2)) : (number_format($occassion_gender_theme->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.occasion', $occassion_gender_theme->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
                                      style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); margin-top: 20px;">
                                        <span style="display: inline-flex; align-items: center; color: white;">
                                            <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                            Book Now
                                        </span>
                                    </a>
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($occassion_bubble_theme->image1)) ? url('upload/occasion_images/'.$occassion_bubble_theme->image1) : url('upload/No_Image_Available.jpg') }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h6>Ready Time <span style="color: deepPink;">– {{$occassion_bubble_theme->ready_time  ?? 'Not available'}}</span></h6>
                                  <a href="{{ route('single.occasion', $occassion_bubble_theme->id) }}" ><h2 class="mb-3">{{$occassion_bubble_theme->title  ?? 'Not available'}}</h2></a>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_bubble_theme->text1 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_bubble_theme->text2 ?? 'Not available'}}</p>
                                  <p><i class="fa fa-check text-success me-3"></i>{{$occassion_bubble_theme->text3 ?? 'Not available'}}</p>
                                  <small>Starting From: </small>
                                  @if($occassion_bubble_theme)
                                    @if ($occassion_bubble_theme->offer_percent > 0)
                                      <h3>
                                        ${{ number_format($occassion_bubble_theme->price - ($occassion_bubble_theme->price * ($occassion_bubble_theme->offer_percent / 100)), 2) }}
                                        <small class="text-decoration-line-through"> ${{ number_format($occassion_bubble_theme->price, 2) }}</small>
                                        <span class="badge text-danger">{{ $occassion_bubble_theme->offer_percent }}% Offer</span>
                                      </h3>
                                    @else
                                      <h3>${{ number_format($occassion_bubble_theme->price, 2) }} </h3>
                                    @endif
                                  
                                    <a href="https://api.whatsapp.com/send?phone={{ $whatsapp_number }}&text=I%20want%20to%20know%20about%20this%20product.%0AProduct%20Title%3A%20{{ urlencode($occassion_bubble_theme->title) }}%0APrice%3A%20%24{{ ($occassion_bubble_theme->offer_percent > 0) ? (number_format($occassion_bubble_theme->price - ($occassion_bubble_theme->price * ($occassion_bubble_theme->offer_percent / 100)), 2)) : (number_format($occassion_bubble_theme->price, 2)) }}%0AProduct%20url%3A%20{{ urlencode(route('single.occasion', $occassion_bubble_theme->id)) }}" target="_blank" class="btn btn-success rounded-pill py-2 px-4 d-flex align-items-center justify-content-center mb-3"
                                      style="position: relative; overflow: hidden; background: linear-gradient(135deg, #3498db, #e74c3c); border: none; transition: transform 0.2s, filter 0.2s; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); margin-top: 20px;">
                                        <span style="display: inline-flex; align-items: center; color: white;">
                                            <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem;"></i> <!-- WhatsApp Icon -->
                                            Book Now
                                        </span>
                                    </a>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


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
                        <h1 class="text-white mb-4">Book For A Service</h1>
                        <form method="post" action="{{ route('send.message') }}" role="form">
                          @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" id="name" class="name form-control border-0" value="{{ old('name') }}" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="phone" id="phone" class="phone form-control border-0" value="{{ old('phone') }}" placeholder="Your Phone" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" id="email" class="eml form-control border-0" value="{{ old('email') }}" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" id="message" class="message form-control border-0" placeholder="Special Request / Message">{{ old('message') }}</textarea>
                                </div>
                                <ul id="saveform_errList"></ul>
                                <div class="col-12">
                                    <button class="send_message btn btn-secondary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h1 class="">Happy Customer Feedback</h1>
                <h6 class="text-primary text-uppercase mb-5">whats trending at bargain balloons themes</h6>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('page_assets/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">A huge Thanks Only team to select me for review of product. Its really mean lots to send me products and i like to suggest all to buy them.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('page_assets/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">A huge Thanks Only team to select me for review of product. Its really mean lots to send me products and i like to suggest all to buy them.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('page_assets/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">A huge Thanks Only team to select me for review of product. Its really mean lots to send me products and i like to suggest all to buy them.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('page_assets/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">A huge Thanks Only team to select me for review of product. Its really mean lots to send me products and i like to suggest all to buy them.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


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

