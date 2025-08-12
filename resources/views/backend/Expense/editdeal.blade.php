@extends('backend.layout.main')

@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>edit deal</h1>
            <nav>
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item">All Deals</li>
                    <li class="breadcrumb-item active">Edit Deal</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Deal</h5>


                            @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/updatedeal') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                    value="{{ $dealid->id }}">
                                
                               

                               
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deal Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputText" name="name" value="{{ $dealid->name }}">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
    
                                    
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Deal price</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" name="price" value="{{ $dealid->price }}" placeholder="1234 Main St">
    
                                        </div>
                                        @error('price')
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
