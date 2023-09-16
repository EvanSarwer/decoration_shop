@extends('admin.admin_dashboard')
@section('admin')


<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  

  <li class="nav-heading">Property Operation</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('user.balloons') }}">
      <i class="bi bi-balloon"></i>
      <span>Balloons</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('user.occasions') }}">
      <i class="bi bi-star"></i>
      <span>Occasions</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('user.holidays') }}">
      <i class="bi bi-cloud-sun-fill"></i>
      <span>Seasonal & Holidays</span>
    </a>
  </li><!-- End Contact Page Nav -->


  <li class="nav-item">
    <a class="nav-link " href="{{ route('user.pageProperty.edit') }}">
      <i class="bi bi-wrench-adjustable-circle"></i>
      <span>Page-Property Update</span>
    </a>
  </li><!-- End Contact Page Nav -->

  

</ul>

</aside>
  
  <!-- End Sidebar-->





<main id="main" class="main">

    <div class="pagetitle">
      <h1>Page Property</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item active">Page Property</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">




      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
  
                <div class="filter">

  
                  <form method="POST" action="{{ route('user.sliderImage.add.post') }}" enctype="multipart/form-data">
                    @csrf

                    <div x-data="{ slider_image: '{{ url('upload/No_Image_Available.jpg') }}'  }" class="row mb-3">
                      <div class="col-md-4 col-lg-3 col-form-label">
                        <button type="submit" class="btn btn-primary ml-4 mt-3">Add Slider Image</button>
                      </div>
                      <div class="col-md-8 col-lg-9">
                        <img x-bind:src="slider_image" alt="Profile" class="img-responsive" style="max-width: 150px; max-height: 100px;">
                          
                        <div class="pt-2">
                          <input x-on:change="slider_image = URL.createObjectURL($event.target.files[0])" name="slider_image" type="file" class="form-control @error('slider_image') is-invalid @enderror" id="slider_image">
                          @error('slider_image')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </form>
  

                </div>
  
                <div class="card-body">
                  <h5 class="card-title">Slider Images</h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Slider Image - Preview</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(isset($slider_images) && count($slider_images) > 0)
                      @foreach($slider_images as $key => $slider_image)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ (!empty($slider_image->image)) ? url('page_assets/img/'.$slider_image->image) : url('upload/No_Image_Available.jpg') }}" alt="Preview" class="img-fluid" style="max-width: 150px;"></a></th>
                        
                        <td>
                          <a href="{{ route('user.sliderImage.delete', $slider_image->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    @else
                        <tr>
                        <td colspan="6">No slider images available.</td>
                      </tr>
                    @endif
  
                      
                    </tbody>
                  </table>
  
                </div>
  
              </div>
            </div><!-- End Recent Sales -->
  
          </div>
        </div><!-- End Left side columns -->
  
        <!-- Right side columns -->
        
  
      </div>














    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
              <div class="card recent-sales overflow-auto">





              <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Page Property</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('user.pageProperty.edit.post') }}" enctype="multipart/form-data">
                    @csrf


                    <div x-data="{ about_image: '{{ (!empty($page_property->about_image)) ? url('page_assets/img/'.$page_property->about_image) : url('upload/No_Image_Available.jpg') }}'  }" class="row mb-3">
                        <label for="about_image" class="col-md-4 col-lg-3 col-form-label">About Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img x-bind:src="about_image" alt="Profile">
                            
                            <div class="pt-2">
                              <input x-on:change="about_image = URL.createObjectURL($event.target.files[0])" name="about_image" type="file" class="form-control @error('about_image') is-invalid @enderror" id="about_image">
                              @error('about_image')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact Info</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="row g-2">

                          <div class="col-md-6">
                            <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                            <input type="text" name="whatsapp_number" class="form-control @error('whatsapp_number') is-invalid @enderror" id="whatsapp_number" value="{{ (old('whatsapp_number')) ? old('whatsapp_number') : $page_property->whatsapp_number }}" >
                            @error('whatsapp_number')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" value="{{ (old('phone_number')) ? old('phone_number') : $page_property->phone_number }}" >
                            @error('phone_number')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ (old('email')) ? old('email') : $page_property->email }}">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" style="height: 80px">{{ (old('address')) ? old('address') : $page_property->address }}</textarea>
                        @error('address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="address_link" class="col-md-4 col-lg-3 col-form-label">Address Link<small> (Map- iframe)</small></label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="address_link" class="form-control @error('address_link') is-invalid @enderror" id="address_link" style="height: 80px">{{ (old('address_link')) ? old('address_link') : $page_property->address_link }}</textarea>
                        @error('address_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="opening_hours1" class="col-md-4 col-lg-3 col-form-label">Opening Hours</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="opening_hours1" type="text" class="form-control @error('opening_hours1') is-invalid @enderror" id="opening_hours1" value="{{ (old('opening_hours1')) ? old('opening_hours1') : $page_property->opening_hours1 }}">
                        @error('opening_hours1')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="details" class="col-md-4 col-lg-3 col-form-label">Extra Details</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="row g-4">

                          <div class="col-md-3">
                            <label for="years_experience" class="form-label">Years Experience</label>
                            <input type="text" name="years_experience" class="form-control @error('years_experience') is-invalid @enderror" id="years_experience" value="{{ (old('years_experience')) ? old('years_experience') : $page_property->years_experience }}" >
                            @error('years_experience')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-3">
                            <label for="expert_technicians" class="form-label">Expert Technicians</label>
                            <input type="text" name="expert_technicians" class="form-control @error('expert_technicians') is-invalid @enderror" id="expert_technicians" value="{{ (old('expert_technicians')) ? old('expert_technicians') : $page_property->expert_technicians }}" >
                            @error('expert_technicians')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-3">
                            <label for="satisfied_clients" class="form-label">Satisfied Clients</label>
                            <input type="text" name="satisfied_clients" class="form-control @error('satisfied_clients') is-invalid @enderror" id="satisfied_clients" value="{{ (old('satisfied_clients')) ? old('satisfied_clients') : $page_property->satisfied_clients }}" >
                            @error('satisfied_clients')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-3">
                            <label for="compleate_projects" class="form-label">Compleate Projects</label>
                            <input type="text" name="compleate_projects" class="form-control @error('compleate_projects') is-invalid @enderror" id="compleate_projects" value="{{ (old('compleate_projects')) ? old('compleate_projects') : $page_property->compleate_projects }}" >
                            @error('compleate_projects')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                        </div>
                        
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="facebook_link" class="col-md-4 col-lg-3 col-form-label">Facebook Link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook_link" type="text" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" value="{{ (old('facebook_link')) ? old('facebook_link') : $page_property->facebook_link }}">
                        @error('facebook_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="instagram_link" class="col-md-4 col-lg-3 col-form-label">Instagram Link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram_link" type="text" class="form-control @error('instagram_link') is-invalid @enderror" id="instagram_link" value="{{ (old('instagram_link')) ? old('instagram_link') : $page_property->instagram_link }}">
                        @error('instagram_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="twitter_link" class="col-md-4 col-lg-3 col-form-label">Twitter Link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter_link" type="text" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link" value="{{ (old('twitter_link')) ? old('twitter_link') : $page_property->twitter_link }}">
                        @error('twitter_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="youtube_link" class="col-md-4 col-lg-3 col-form-label">Youtube Link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="youtube_link" type="text" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link" value="{{ (old('youtube_link')) ? old('youtube_link') : $page_property->youtube_link }}">
                        @error('youtube_link')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>


                   

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update Item</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>



              </div><!-- End Bordered Tabs -->

            </div>
          </div>








        </div>
      </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

    </div>


  </br>
  </br>


    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          
          
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->
              <div class="filter">



                <form method="POST" action="{{ route('user.add.customerFeedback.post') }}" >
                  @csrf
                  <div class="row mb-3">
                    <div class="col-md-4 col-lg-3 col-form-label">
                      <button type="submit" class="btn btn-primary ml-4 mt-3">Add Feedback</button>
                    </div>
                    
                    <div class="col-md-8 col-lg-9">
                      <div class="row g-4">

                        <div class="col-md-3">
                          <label for="client_name" class="form-label">Client Name</label>
                          <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" id="client_name" value="{{ old('client_name') }}" placeholder="Client Name">
                          @error('client_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-3">
                          <label for="client_email" class="form-label">Email<small> (Optional)</small></label>
                          <input type="email" name="client_email" class="form-control @error('client_email') is-invalid @enderror" id="client_email" value="{{ old('client_email') }}" placeholder="Client Email">
                          @error('client_email')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="client_feedback" class="form-label">Feedback</label>
                          {{-- <input type="text" name="client_feedback" class="form-control @error('client_feedback') is-invalid @enderror" id="client_feedback" value="{{ old('client_feedback') }}" placeholder="Client Feedback"> --}}
                          <textarea name="client_feedback" class="form-control @error('client_feedback') is-invalid @enderror" id="client_feedback" style="height: 35px" placeholder="Client Feedback" >{{ old('client_feedback') }}</textarea>
                          @error('client_feedback')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                      

                      </div>
                      
                    </div>
                  </div>
                </form>





              </div>

              <script>
                // Use the Blade syntax to echo the PHP variable into JavaScript
                var myVariable = @json($page_property);
            
                // Log the value to the console
                console.log(myVariable);
              </script>

              <div class="card-body">
                <h5 class="card-title">Customer Feedback <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Client Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Feedback</th>
                      <th scope="col">Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(isset($page_property->client_feedbacks) && count($page_property->client_feedbacks) > 0)
                    @foreach($page_property->client_feedbacks as $key => $client_feedback)
                    <tr>
                      <td>
                        {{ $client_feedback->client_name }}
                      </td>
                      <td>{{ $client_feedback->client_email ?? 'Email not included' }}</td>
                      <td>{{ $client_feedback->client_feedback ?? 'Feedback not available' }}</td>
                      <td>
                        <a href="{{ route('user.customerFeedback.delete', $client_feedback->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                      <tr>
                      <td colspan="6">No customer feedback available.</td>
                    </tr>
                  @endif

                    
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      

    </div>








  </section>

</main>



@endsection