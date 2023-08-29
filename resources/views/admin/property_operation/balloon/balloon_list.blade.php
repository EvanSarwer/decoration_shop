@extends('admin.admin_dashboard')
@section('admin')


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
                          Category: {{ $balloon->category }} </br> Quantity: {{ $balloon->quantity ?? 'Not available' }}, Size: {{ $balloon->size ?? 'Not available' }} </br> Shape: {{ $balloon->shape ?? '' }}, Brand: <img src="">
                          
                        </td>
                        <td>
                          @if ($balloon->offer_percent > 0)
                            <span>
                              ${{ number_format($balloon->price - ($balloon->price * ($balloon->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($balloon->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $balloon->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($balloon->price, 2) }}
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