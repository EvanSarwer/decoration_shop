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
    <a class="nav-link " href="{{ route('user.balloons') }}">
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
      <h1>Balloon Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item active">Balloon Category</li>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Add Balloon Category</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('user.balloonCategory.edit.post') }}" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $balloon_category->id }}">
                    <div class="row mb-3">
                      <label for="category_name" class="col-md-4 col-lg-3 col-form-label">Category Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value="{{ (old('category_name')) ? old('category_name') : $balloon_category->category_name }}">
                        @error('category_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update Category</button>
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