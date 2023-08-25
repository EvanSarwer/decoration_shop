@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <div class="row">
        <div class="col-lg-12">


        

          <div class="card">
            <div class="filter">
              <a href="{{ route('message.seen') }}" class="btn btn-primary">Clear</a>
            </div>
            <div class="card-body">

              <h5 class="card-title">Client Messages</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th scope="col">Id</th> -->
                    <th scope="col">Client Name</th>
                    <th scope="col">Email/Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Product</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($messages) > 0)
                  @foreach($messages as $key => $message)
                    <tr class="{{ ($message->status === 'unseen') ? 'table-primary' : '' }}">
                      <!-- <th scope="row">{{ $message->id }}</th> -->
                      <td>{{ $message->message->name ?? 'Not available' }}</td>
                      <td>{{ $message->message->email ?? 'Email not available' }} </br> {{ $message->message->phone ?? 'Phone not available' }}</td>
                      <td>{{ $message->message->message ?? 'Not available' }}</td>
                      <td>{{ $message->message->product ?? 'Not available' }}</td>
                      <td>{{ $message->created_at }} </br> {{ $message->deliver_time }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6">No messages available.</td>
                  </tr>
                @endif
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>





        </div>
      </div>



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
                  <a href="{{ route('appUser.create') }}" class="btn btn-primary">Create New</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">App Users <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email/Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($app_users) > 0)
                      @foreach($app_users as $key => $user)
                      <tr>
                        <th scope="row"><a href="#">{{$user->username}}</a></th>
                        <td>
                          {{ $user->name }}
                          @if ($user->status === 'active')
                            <span class="badge bg-success">Active</span>
                          @else
                            <span class="badge bg-danger">Inactive</span>
                          @endif
                        </td>
                        <td>{{ $user->email ?? 'Email not available' }} </br> {{ $user->phone ?? 'Phone not available' }}</td>
                        <td>{{ $user->address ?? 'Address not available' }}</td>
                        <td>
                          <a href="{{ route('appUser.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a> 
                          @if ($user->status === 'active')
                            <a href="{{ route('appUser.status', ['id' => $user->id, 'status' => 'inactive']) }}" class="btn btn-danger btn-sm">Deactivate</a>
                          @else
                            <a href="{{ route('appUser.status', ['id' => $user->id, 'status' => 'active']) }}" class="btn btn-success btn-sm">Active</a></td>
                          @endif
                      </tr>
                      @endforeach
                    @else
                        <tr>
                        <td colspan="6">No messages available.</td>
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