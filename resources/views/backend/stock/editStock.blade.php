@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>stocks</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item">All stocks</li>
                    <li class="breadcrumb-item active">Edit stock</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit stock</h5>


                            @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/updatestock') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                    value="{{ $stockid->id }}">
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="customFile">Upload Blog Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="customFile" name="image"
                                            value="{{ $stockid->image }}" />
                                        @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="stock"
                                            value="{{ $stockid->stock }}">
                                    </div>
                                    @error('stock')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" class="form-control"
                                            value="{{ $stockid->quantity }}">
                                    </div>
                                    @error('quantity')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">price</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" class="form-control"
                                            value="{{ $stockid->price }}">
                                    </div>
                                    @error('price')
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
