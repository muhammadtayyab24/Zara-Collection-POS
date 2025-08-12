@extends('backend.layout.main')

@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Stock</h1>
            <nav>
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Stock</li>
                    <li class="breadcrumb-item active">Add New Stock</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Stock</h5>

                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/savestock') }}" enctype="multipart/form-data">
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="stock" placeholder="Stock" required>
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
                                        <input type="number" name="quantity" class="form-control" placeholder="Stock Quantity" required>
                                    </div>
                                    @error('quantity')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Stock Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" class="form-control" placeholder="Stock Price" required>
                                    </div>
                                    @error('price')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Stock</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>



                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
