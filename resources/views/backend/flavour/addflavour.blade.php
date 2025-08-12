@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Flavour</h1>
            <nav>
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Flavour</li>
                    <li class="breadcrumb-item active">Add New Flavour</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Flavour</h5>

                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <!-- Horizontal Form -->
                            <form method="POST" action="{{ url('admin/saveflavour') }}" enctype="multipart/form-data">
                                @csrf

                               
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Flavour Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="flavour_name" placeholder="Flavour Name">
                                    </div>
                                    @error('flavour_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Flavour</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>



                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
