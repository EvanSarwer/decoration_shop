@extends('admin.admin_dashboard')
@section('admin')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Occasions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Items</li>
          <li class="breadcrumb-item active">Occasions</li>
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
                  <a href="{{ route('user.occasion.create') }}" class="btn btn-primary">Add Item</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Occasion <span>| Items</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th scope="col">Preview</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Feature Text</th>
                        <th scope="col">Price</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($occasions) > 0)
                      @foreach($occasions as $key => $occasion)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ (!empty($occasion->image1)) ? url('upload/occasion_images/'.$occasion->image1) : url('upload/No_Image_Available.jpg') }}" alt="Preview" class="img-fluid" style="max-width: 100px;"></a></th>
                        <!-- <th scope="row"><img src="">
                          @if ($occasion->image2)
                            <img src="">
                          @elseif ($occasion->image3)
                            <img src="">
                          @endif
                        </th> -->
                        <td scope="row"><a href="#">{{ $occasion->title ?? 'Not available'}}
                          @if ($occasion->featuring === 'yes')
                            <span class="badge bg-info">Featuring</span>
                          @endif
                        </a></td>
                        <td>{{ $occasion->category }}</td>
                        <td>
                          -> {{ $occasion->text1 }} </br> -> {{ $occasion->text2 ?? 'Not available' }} </br> -> {{ $occasion->text3 ?? 'Not available' }}
                          
                        </td>
                        <td>
                          @if ($occasion->offer_percent > 0)
                            <span>
                              ${{ number_format($occasion->price - ($occasion->price * ($occasion->offer_percent / 100)), 2) }}
                              <small class="text-decoration-line-through"> ${{ number_format($occasion->price, 2) }}</small>
                            </span> </br>
                            <span class="badge text-danger">{{ $occasion->offer_percent }}% Offer</span>
                          @else
                            ${{ number_format($occasion->price, 2) }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('user.occasion.edit', $occasion->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ route('user.occasion.delete', $occasion->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</a>
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