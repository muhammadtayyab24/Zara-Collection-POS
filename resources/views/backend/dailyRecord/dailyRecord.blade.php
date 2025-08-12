@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daily Record</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Record</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    {{-- <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">Add New Daily Record</h5>
                            </center>
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('admin/save-onlinePayment') }}" id="orderForm">
                                @csrf
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">payment System</th>
                                            <th scope="col">Sender Name</th>
                                            <th scope="col">Receiver Name</th>
                                            <th scope="col">amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Initial row -->
                                        <tr>

                                            <td>
                                                <input type="text" name="payment_system"
                                                    class="form-control payment_system" placeholder="payment system"
                                                    required>
                                            </td>
                                            <td><input type="text" name="sender" class="form-control sender"
                                                    placeholder="Sender name" required>
                                            </td>
                                            <td><input type="text" name="receiver" class="form-control receiver"
                                                    placeholder="Receiver name" required>
                                            </td>
                                            <td><input type="number" name="amount" class="form-control amount"
                                                    placeholder="Enter Amount" required>
                                            </td>



                                            <td><button type="submit" class="btn btn-primary">Add</button></td>
                                        </tr>

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div> --}}

                        <div class="card">
                        <div class="card-body">
                             
                            <center>
                                <h5 class="card-title">Daily Record</h5>
                            </center>
                           
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Expense</th>
                                        <th scope="col">Sell Profit</th>
                                        <th scope="col">Net Profit</th>
                                        {{-- <th scope="col">Date</th> --}}
                                        {{-- <th scope="col">Actions</th> --}}



                                    </tr>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp

                                   
                                    @foreach ($combinedData as $date => $data)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $date }}</td>
                                        <td>{{ $data['total_expense'] }}</td>
                                        <td>{{ $data['total_profit'] }}</td>
                                        <td>{{ $data['net_profit'] }}</td>
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
