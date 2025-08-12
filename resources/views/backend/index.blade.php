@extends('backend.layout.main')

@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Sales <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalSale }}</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body" id="revenue-card-body">
                                    <h5 class="card-title">Revenue <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                           <h4>PKR</h4>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalAmount }}</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Total Products <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $products }}</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Total Customers <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $customer }}</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">


                                <div class="card-body">
                                    <h5 class="card-title">Recent Sale <span>| Today</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">admin</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">seller </th>
                                                <th scope="col">payment Method</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($recentOrders as $recent)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    {{-- <td>{{ $recent->user->name }}</td> --}}
                                                    <td>
                                                        @if(isset($recent->user->name) && !empty($recent->user->name))
                                                            {{ $recent->user->name }}
                                                        @else
                                                            Old 
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($recent->order->name) && !empty($recent->order->name))
                                                            {{ $recent->order->name }}
                                                        @else
                                                            walking Customer
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(isset($recent->employee->employee_name) && !empty($recent->employee->employee_name))
                                                            {{ $recent->employee->employee_name }}
                                                        @else
                                                            Old Seller
                                                        @endif
                                                    </td>
                                                        
                                                        <td>
                                                            @if ($recent->payment_method == 'cash')
                                                                <span class="badge bg-danger">{{ $recent->payment_method }}</span>
                                                            @else
                                                                <span class="badge bg-warning">{{ $recent->payment_method }}</span>
                                                            @endif
                                                        </td>
                                                    <td>{{ $recent->trans_amount }}.00</td>
                                                    <td>{{ $recent->trans_date }}</td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->



                    </div>
                </div><!-- End Left side columns -->



            </div>
        </section>

    </main><!-- End #main -->
@endsection
