@extends('backend.layout.main');

@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Customer</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item">All Customers</li>
                    <li class="breadcrumb-item active">Edit Customer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Customer</h5>


                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/updatecustomer') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                    value="{{ $customerid->id }}">




                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name"
                                            value="{{ $customerid->name }}">
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
                                        <input type="number" name="phone_no" class="form-control"
                                            value="{{ $customerid->phone_no }}" placeholder="03312345">
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
                                            value="{{ $customerid->address }}" placeholder="1234 Main St">

                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
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
