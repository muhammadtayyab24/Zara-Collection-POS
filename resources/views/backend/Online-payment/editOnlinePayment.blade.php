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
                            <form method="POST" action="{{ url('admin/updateonlinePayment') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="inputText" name="id"
                                value="{{ $onlinePaymentid->id }}">
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
                                                <input type="text" name="payment_system" class="form-control payment_system"
                                                    placeholder="payment system" value="{{ $onlinePaymentid->payment_system }}" required>
                                            </td>
                                            <td><input type="text" name="sender" class="form-control sender"
                                                    placeholder="Sender name" value="{{ $onlinePaymentid->sender }}" required>
                                            </td>
                                            <td><input type="text" name="receiver" class="form-control receiver"
                                                placeholder="Receiver name" value="{{ $onlinePaymentid->receiver }}" required>
                                        </td>
                                            <td><input type="number" name="amount" class="form-control amount"
                                                    placeholder="Enter Amount" value="{{ $onlinePaymentid->amount }}" required>
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
