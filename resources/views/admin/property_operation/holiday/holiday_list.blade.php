@extends('admin.admin_dashboard')
@section('admin')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Seasonal & Holidays</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item active">Seasonal & Holidays</li>
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
                  <a href="{{ route('user.holiday.create') }}" class="btn btn-primary">Add Item</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Seasonal & Holiday<span>| Items</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th scope="col">Preview</th>
                        <th scope="col">Title</th>
                        <th scope="col">Feature Text</th>
                        <th scope="col">Price</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($holidays) > 0)
                      @foreach($holidays as $key => $holiday)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ (!empty($holiday->image1)) ? url('upload/holiday_images/'.$holiday->image1) : url('upload/No_Image_Available.jpg') }}" alt="Preview" class="img-fluid" style="max-width: 100px;"></a></th>
                        <!-- <th scope="row"><img src="">
                          @if ($holiday->image2)
                            <img src="">
                          @elseif ($holiday->image3)
                            <img src="">
                          @endif
                        </th> -->
                        <td scope="row"><a href="#">{{ $holiday->title ?? 'Not available'}}
                          @if ($holiday->featuring === 'yes')
                            <span class="badge bg-info">Featuring</span>
                          @endif
                        </a></td>
                        <td>
                          -> {{ $holiday->text1 }} </br> -> {{ $holiday->text2 ?? 'Not available' }} </br> -> {{ $holiday->text3 ?? 'Not available' }}
                          
                        </td>
                        <td>
                          @if ($holiday->offer_percent > 0)
                            <span>
                              ${{ number_format($holiday->price - ($holiday->price * ($holiday->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($holiday->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $holiday->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($holiday->price, 2) }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('user.holiday.edit', $holiday->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ route('user.holiday.delete', $holiday->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
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