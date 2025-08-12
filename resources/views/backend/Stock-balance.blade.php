@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Balance</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Balance</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">Add New Balance</h5>
                            </center>
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('admin/save-balance') }}" id="orderForm">
                                @csrf
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Stock name</th>
                                            <th scope="col">Dealer Name</th>
                                            <th scope="col">Total amount</th>
                                            <th scope="col">Sent</th>
                                            <th scope="col">Pending</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Initial row -->
                                        <tr>

                                            <td>1</td>

                                            <td>
                                                <input type="text" name="stock_name" class="form-control stock_name"
                                                    placeholder="stock name" required>
                                            </td>
                                            <td><input type="text" name="dealer_name" class="form-control dealer_name"
                                                    placeholder="dealer name" required>
                                            </td>
                                            <td><input type="number" name="total_amount" class="form-control total_amount"
                                                    placeholder="Enter Total Amount" required>
                                            </td>
                                            <td><input type="number" name="sent" class="form-control sent"
                                                    placeholder="sent" required></td>
                                            <td><input type="number" name="pending" class="form-control pending"
                                                    placeholder="pending" required></td>

                                            <td><button type="submit" class="btn btn-primary">Add</button></td>
                                        </tr>

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>

                        <div class="card">
                        <div class="card-body">
                             
                            <center>
                                <h5 class="card-title">Stock Balance</h5>
                            </center>
                            <br>
                            <form method="get" action="#">
                                <input type="date" name="date" />
                                <button type="submit" name="year" class="btn btn-primary" value="year">Search</button>

                            </form>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Stock name</th>
                                        <th scope="col">Dealer Name</th>
                                        <th scope="col">Total amount</th>
                                        <th scope="col">Sent</th>
                                        <th scope="col">Pending</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp

                                    @foreach ($data as $data)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $data->stock_name }}</td>
                                            <td>{{ $data->dealer_name }}</td>
                                            <td>{{ $data->total_amount }}</td>
                                            <td>{{ $data->clear_amount }}</td>
                                            <td>{{ $data->pending }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td><a href="{{ url('admin/editbalance/' . $data->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit Balance Detail"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="{{ url('admin/deletebalance/' . $data->id) }}"
                                                    class="btn btn-danger btn-sm" title="Delete My Account"><i
                                                        class="bi bi-trash"></i></a>
                                            </td>

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
