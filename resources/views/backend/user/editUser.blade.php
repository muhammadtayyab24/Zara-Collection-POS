
@extends('backend.layout.main')

@section('main-container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin</h1>
        <nav>
            <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">All User</li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>

                      

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ url('admin/updateuser') }}">
                          @csrf
                            <div class="row mb-3">
                                <input type="hidden" class="form-control" id="inputText" name="id" value="{{ $userid->id }}" >
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputText" name="name" value="{{ $userid->name }}" >
                                </div>
                                @error('name')
                                        <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                        </div>
                                        @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $userid->email }}">
                                </div>
                                @error('email')
                                        <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                        </div>
                                        @enderror
                            </div>
                            <div class="row mb-3">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">User name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputText" name="username" value="{{ $userid->username }}">
                              </div>
                              @error('username')
                                        <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                        </div>
                                        @enderror
                            </div>
                           
                            
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>



            </div>


        </div>
    </section>

</main><!-- End #main -->
@endsection