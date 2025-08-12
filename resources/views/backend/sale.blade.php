@extends('backend.layout.main')
@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Revenue</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Revenue</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
  
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Revenue</h5>  
              <form method="get" action="#">
                <input type="date" name="date" />
                <button type="submit" name="year" class="btn btn-primary" value="year">Search</button>

              </form>
             
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Seller</th>
                    <th scope="col">Customer</th>
            
                    <th scope="col">Admin name</th>
                    <th scope="col">Payment Method</th>

                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    {{-- <th scope="col">Actions</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
  
                  @foreach ($trans as $data)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>
                      @if(isset($data->employee->employee_name) && !empty($data->employee->employee_name))
                      {{ $data->employee->employee_name }}
                      @else
                          Old Seller
                      @endif
                    </td>
                    <td>
                      @if(isset($data->order->name) && !empty($data->order->name))
                          {{ $data->order->name }}
                      @else
                          Walking Customer
                      @endif
                    </td>
                 
                   
                   
                    <td>
                      @if(isset($data->user->name) && !empty($data->user->name))
                          {{ $data->user->name }}
                      @else
                          Old Admin
                      @endif
                    </td>
                    <td>
                      @if ($data->payment_method == 'cash')
                          <span class="badge bg-success">{{ $data->payment_method }}</span>
                      @else
                          <span class="badge bg-warning">{{ $data->payment_method }}</span>
                      @endif
                  </td>
                    <td>{{ $data->trans_date }}</td>
                    <td>{{ $data->trans_amount }}</td>
                    
                      {{-- <td><a href="{{ url('admin/deletesale/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a></td> --}}
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

