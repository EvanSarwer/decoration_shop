@extends('admin.admin_dashboard')
@section('admin')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>App User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">App User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit App User</h5>

              <!-- Vertical Form -->
              <form method="POST" action="{{ route('appUser.edit.post') }}" class="row g-3">
                @csrf 

                <input type="hidden" name="id" value="{{ $app_user->id }}">
                <div class="col-12">
                  <label for="name" class="form-label">Your Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ (old('name')) ? old('name') : $app_user->name }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ (old('username')) ? old('username') : $app_user->username }}">
                  @error('username')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ (old('email')) ? old('email') : $app_user->email }}">
                  @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                  @error('password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-12">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ (old('phone')) ? old('phone') : $app_user->phone }}">
                  @error('phone')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ (old('address')) ? old('address') : $app_user->address }}" placeholder="1234 Main St">
                  @error('address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


        </div>

        <div class="col-lg-2"></div>
      </div>
    </section>

  </main>




@endsection