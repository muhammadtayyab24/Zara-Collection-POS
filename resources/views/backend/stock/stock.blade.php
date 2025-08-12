
@extends('backend.layout.main')
@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Stock</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Stocks</li>
          <li class="breadcrumb-item active">All Stock</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Stock</h5>
              <a href="{{ url('admin/addstock') }}"><button type="#" class="btn btn-primary">Add New Stock</button></a>
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
                    <th scope="col">Stock</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
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

                    <td>{{ $data->stock }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->created_at }}</td>
                    
                    <td><a href="{{ url('admin/editstock/'.$data->id) }}" class="btn btn-primary btn-sm" title="Edit stock Detail"><i class="bi bi-pencil-fill"></i></a>
                      <a href="{{ url('admin/deletestock/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete stock"><i class="bi bi-trash"></i></a></td>
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