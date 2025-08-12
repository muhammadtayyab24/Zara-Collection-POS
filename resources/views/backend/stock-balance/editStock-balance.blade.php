@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Balance</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Balance</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                           <center> <h5 class="card-title">Edit Balance</h5></center>
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('admin/updatebalance') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                value="{{ $balanceid->id }}">
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
                                                    placeholder="stock name" value="{{ $balanceid->stock_name }}" required>
                                            </td>
                                            <td>
                                                <input type="text" name="dealer_name" class="form-control dealer_name"
                                                    placeholder="dealer name" value="{{ $balanceid->dealer_name }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="total_amount" class="form-control total_amount"
                                                    placeholder="Enter Total Amount" value="{{ $balanceid->total_amount }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="sent" class="form-control sent"
                                                    placeholder="sent" value="{{ $balanceid->clear_amount }}" required>
                                                </td>
                                            <td>
                                                <input type="number" name="pending" class="form-control pending"
                                                    placeholder="pending" value="{{ $balanceid->pending }}" required>
                                            </td>

                                            <td><button type="submit" class="btn btn-primary">Edit</button></td>
                                        </tr>

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>






    </main><!-- End #main -->
@endsection
