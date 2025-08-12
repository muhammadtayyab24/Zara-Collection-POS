@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Employee</h1>
            <nav>
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Employee</li>
                    <li class="breadcrumb-item active">Add New Employee</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Employee</h5>

                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ url('admin/saveemployee') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="customFile">Upload Product Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="customFile" name="image" />
                                        @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Employee</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="employee" placeholder="employee Name" required>
                                    </div>
                                    @error('employee')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Phone_no</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone_no" class="form-control" placeholder="Employee Phone No" required>
                                    </div>
                                    @error('phone_no')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Commission(%)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="commission" class="form-control" placeholder="employee commission" required>
                                    </div>
                                    @error('commission')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Salary</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="salary" class="form-control" placeholder="salary" required>
                                    </div>
                                    @error('salary')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add employee</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>



                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
