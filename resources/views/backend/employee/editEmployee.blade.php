@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item">All employees</li>
                    <li class="breadcrumb-item active">Edit employee</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit employee</h5>


                            @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/updateemployee') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                    value="{{ $employeeid->id }}">
                                
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">employee</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="employee"
                                            value="{{ $employeeid->employee_name }}">
                                    </div>
                                    @error('employee')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Phone No</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone_no" class="form-control"
                                            value="{{ $employeeid->phone_no }}">
                                    </div>
                                    @error('phone_no')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Commission</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="commission" class="form-control"
                                            value="{{ $employeeid->commission }}">
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
                                        <input type="number" name="salary" class="form-control"
                                            value="{{ $employeeid->salary }}">
                                    </div>
                                    @error('salary')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    {{-- <button type="reset" class="btn btn-secondary">Back</button> --}}
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>



                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
