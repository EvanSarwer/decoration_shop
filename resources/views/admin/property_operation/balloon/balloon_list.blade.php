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
      <h1>Balloon List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Items</li>
          <li class="breadcrumb-item active">Balloon List</li>
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
  
  
  
                  <form method="POST" action="{{ route('user.add.balloonCategory.post') }}" >
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-4 col-lg-3 col-form-label">
                        <button type="submit" class="btn btn-primary ml-4 mt-3">Add Category</button>
                      </div>
                      
                      <div class="col-md-8 col-lg-9">
                        <div class="row g-4">
  
                          <div class="col-md-6">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value="{{ old('category_name') }}" placeholder="Category Name">
                            @error('category_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6">
                          </div>
                        
  
                        </div>
                        
                      </div>
                    </div>
                  </form>
  
  
  
  
  
                </div>
  
                <div class="card-body">
                  <h5 class="card-title">Category<span>| Balloon</span></h5>
  
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(isset($balloon_categories) && count($balloon_categories) > 0)
                      @foreach($balloon_categories as $key => $category)
                      <tr>
                        <td>
                          {{ $category->category_name }}
                        </td>
                        <td>
                          <a href="{{ route('user.balloonCategory.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ route('user.balloonCategory.delete', $category->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
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








    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
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
                  <a href="{{ route('user.balloon.create') }}" class="btn btn-primary">Add Item</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Balloon <span>| Items</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th scope="col">Preview</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category/Details</th>
                        <th scope="col">Price</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($balloons) > 0)
                      @foreach($balloons as $key => $balloon)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ (!empty($balloon->image1)) ? url('upload/balloon_images/'.$balloon->image1) : url('upload/No_Image_Available.jpg') }}" alt="Preview" class="img-fluid" style="max-width: 100px;"></a></th>
                        <!-- <th scope="row"><img src="">
                          @if ($balloon->image2)
                            <img src="">
                          @elseif ($balloon->image3)
                            <img src="">
                          @endif
                        </th> -->
                        <td scope="row"><a href="#">{{ $balloon->title ?? 'Not available'}}
                          @if ($balloon->featuring === 'yes')
                            <span class="badge bg-info">Featuring</span>
                          @endif
                        </a></td>
                        <td>
                          Category: {!! $balloon->category ? $balloon->category->category_name : '<span style="color: red;">Not Available</span>' !!} </br> Quantity: {{ $balloon->quantity ?? 'Not available' }}, Size: {{ $balloon->size ?? 'Not available' }} </br> Shape: {{ $balloon->shape ?? '' }}, Brand: <img src="">
                          
                        </td>
                        <td>
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ₹{{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ₹{{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ₹{{ number_format($balloon->price, 2) }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('user.balloon.edit', $balloon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ route('user.balloon.delete', $balloon->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
                      </tr>
                      @endforeach
                    @else
                        <tr>
                        <td colspan="6">No items available.</td>
                      </tr>
                    @endif

                      
                    </tbody>
                  </table>

                </div>

              </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

      </div>



    </section>

  </main>



@endsection