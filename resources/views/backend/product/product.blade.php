
@extends('backend.layout.main');

@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">All Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Products</h5>
              <a href="{{ url('admin/addproduct') }}"><button type="#" class="btn btn-primary">Add New Product</button></a>
              <!-- Table with stripped rows -->
              @if(Session::has('status'))
              <div class="alert alert-success" role="alert">
               {{Session::get('status')}}
              </div>
              @endif
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    {{-- <th scope="col">image</th> --}}
                    <th scope="col">product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Per Piece Price</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach ($userData as $data)
                    
                 
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                   
                    {{-- <td> <img src="{{ asset('storage/'.$data->image) }}" width="50px" alt="Image"></td> --}}

                    <td>{{ $data->product_name }}</td>

                    <td>
                       @if ($data->quantity == "0")
                       <span class="badge bg-danger">Out Of stock</span>
                        @else
                            {{ $data->quantity }}
                      @endif
                      </td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td><a href="{{ url('admin/editproduct/'.$data->id) }}" class="btn btn-primary btn-sm" title="Edit Product Detail"><i class="bi bi-pencil-fill"></i></a>
                      <a href="{{ url('admin/deleteproduct/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete Product"><i class="bi bi-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection