@extends('backend.layout.main');

@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Customer</li>
                    <li class="breadcrumb-item active">Add New Customer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Customer</h5>

                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/savecustomer') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name"
                                            placeholder="Full Name" required>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Phone No</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone_no" class="form-control" placeholder="03312345"
                                            required>
                                    </div>
                                    @error('phone_no')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" name="address"
                                            placeholder="1234 Main St" required>

                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add New Customer</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>



                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
