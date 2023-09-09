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
    <a class="nav-link " href="{{ route('user.occasions') }}">
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
    <a class="nav-link collapsed" href="{{ route('user.pageProperty.edit') }}">
      <i class="bi bi-wrench-adjustable-circle"></i>
      <span>Page-Property Update</span>
    </a>
  </li><!-- End Contact Page Nav -->

  

</ul>

</aside>
  
  <!-- End Sidebar-->





<main id="main" class="main">

    <div class="pagetitle">
      <h1>Occasion</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item active">Occasion</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">



    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
              <div class="card recent-sales overflow-auto">





              <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Occasion Item</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('user.occasion.edit.post') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $occasion->id }}">
                    <div x-data="{ productImage1: '{{ (!empty($occasion->image1)) ? url('upload/occasion_images/'.$occasion->image1) : url('upload/No_Image_Available.jpg') }}' }" class="row mb-3">
                        <label for="image1" class="col-md-4 col-lg-3 col-form-label">Item Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img x-bind:src="productImage1" alt="Profile">
                            <div class="pt-2">
                            <input x-on:change="productImage1 = URL.createObjectURL($event.target.files[0])" name="image1" type="file" class="form-control @error('image1') is-invalid @enderror" id="image1">
                            @error('image1')
                              <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ (old('title')) ? old('title') : $occasion->title }}">
                        @error('title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" style="height: 100px">{{ (old('description')) ? old('description') : $occasion->description }}</textarea>
                        @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="category" class="col-md-4 col-lg-3 col-form-label">Category</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="category" type="text" class="form-control @error('category') is-invalid @enderror" id="category" value="{{ (old('category')) ? old('category') : $occasion->category }}">
                        @error('category')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="text" class="col-md-4 col-lg-3 col-form-label">Feature Text</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="text1" type="text" class="form-control @error('text1') is-invalid @enderror" id="text1" value="{{ (old('text1')) ? old('text1') : $occasion->text1 }}" placeholder="Feature Text">
                        @error('text1')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror </br>

                        <input name="text2" type="text" class="form-control @error('text2') is-invalid @enderror" id="text2" value="{{ (old('text2')) ? old('text2') : $occasion->text2 }}" placeholder="Feature Text">
                        @error('text2')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror </br>

                        <input name="text3" type="text" class="form-control @error('text3') is-invalid @enderror" id="text3" value="{{ (old('text3')) ? old('text3') : $occasion->text3 }}" placeholder="Feature Text">
                        @error('text3')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror </br>
                      </div>
                    </div>
              


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Pricing Details</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="row g-2">

                          <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ (old('price')) ? old('price') : $occasion->price }}" >
                            @error('price')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="offer_percent" class="form-label">Offer in (%)</label>
                            <input type="text" name="offer_percent" class="form-control @error('offer_percent') is-invalid @enderror" id="offer_percent" value="{{ (old('offer_percent')) ? old('offer_percent') : $occasion->offer_percent }}" >
                            @error('offer_percent')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="ready_time" class="col-md-4 col-lg-3 col-form-label">Ready Time</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ready_time" type="text" class="form-control @error('ready_time') is-invalid @enderror" id="ready_time" value="{{ (old('ready_time')) ? old('ready_time') : $occasion->ready_time }}" placeholder="Duration">
                        @error('ready_time')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror 
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Additional Info</label>
                      <div class="col-md-8 col-lg-9">

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="featuring" id="featuring" value="yes" {{ ($occasion->featuring === 'yes') ? 'checked' : '' }}>
                          <label class="form-check-label" for="featuring">
                            Add as Featuring.
                          </label>
                          @error('featuring')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Item</button>
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



  </section>

</main>



@endsection