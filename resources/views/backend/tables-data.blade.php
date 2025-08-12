
@extends('backend.layout.main')

@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">All Admin/User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Users/Admins</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
              <a href="{{ url('admin/adduser') }}"><button type="#" class="btn btn-primary">Add New User</button></a>
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
                    <th scope="col">Name</th>
                    <th scope="col">username</th>
                    <th scope="col">Email</th>
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
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                    
                    <td><a href="{{ url('admin/edituseris/'.$data->id) }}" class="btn btn-primary btn-sm" title="Edit User profile"><i class="bi bi-pencil-fill"></i></a>
                      <a href="{{ url('admin/deleteuser/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete My Account"><i class="bi bi-trash"></i></a></td>
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
