
@extends('backend.layout.main');

@section('main-container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">All Transactions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Transaction</h5>
              <p>All transaction </p>
             
              @if(Session::has('status'))
              <div class="alert alert-success" role="alert">
               {{Session::get('status')}}
              </div>
              @endif
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order_id</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Admin id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach ($trans as $data)
                    
                 
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $data->order_id }}</td>
                    <td>{{ $data->payment_method }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->trans_date }}</td>
                    <td>{{ $data->trans_amount }}</td>
                    
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

