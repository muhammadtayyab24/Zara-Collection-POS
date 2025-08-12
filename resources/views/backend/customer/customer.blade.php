
@extends('backend.layout.main')
@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Customers</li>
          <li class="breadcrumb-item active">All Customers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Customers</h5>
              <a href="{{ url('admin/addcustomer') }}"><button type="#" class="btn btn-primary">Add New customer</button></a>
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
                    <th scope="col">Customer name</th>
                    <th scope="col">Phone no</th>
                    <th scope="col">Address</th>
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
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone_no }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->created_at }}</td>
                    
                    <td><a href="{{ url('admin/editcustomer/'.$data->id) }}" class="btn btn-primary btn-sm" title="Edit Product profile"><i class="bi bi-pencil-fill"></i></a>
                      <a href="{{ url('admin/deletecustomer/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete My Account"><i class="bi bi-trash"></i></a></td>
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