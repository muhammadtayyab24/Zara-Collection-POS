@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daily Expense</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Expense</li>
                    <li class="breadcrumb-item active">Daily Expense</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
    <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Expense</h5>
                    {{-- @livewire('order') --}}
                    @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif

                    <form method="POST" action="{{ url('admin/saveexpense') }}">
                        @csrf
                        
                    <table class="table datatable">
                       
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Expense</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                            

                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="col-sm-10">
                                        
                                        <input type="text" name="item_name" id="item_name" placeholder="item_name"
                                        class="form-control item_name" required>
                                    </div>
                                </td>

                                
                                <td>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" id="price" placeholder="price"
                                            class="form-control price" required>
                                            
                                    </div>
                                </td>
                              
                                <td> <button type="submit" class="btn btn-primary">Expense</button></td>
                            </tr>

                        </tbody>

                    </table>
                    </form>

                </div>
            </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daily Expense </h5>
                            <div style="float: left"><a href="{{ url('admin/addexpense') }}"><button type="#"
                                        class="btn btn-primary">Add Today Expense</button></a></div>
                            <div style="float: right">
                                <form method="get" action="#">
                                    <input type="date" name="date" />
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                            <br><br>
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Items</th>
                                        <th scope="col">Total Expense</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($expenses as $dailyExpense)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $dailyExpense->expense_date }}</td>
                                            <td>
                                                @foreach ($dailyExpense->expenses as $item)
                                                    <li style="list-style-type: none">Item: {{ $item->item_name }}, Price:
                                                        {{ $item->price }}</li>
                                                @endforeach
                                            </td>
                                            <td>{{ $dailyExpense->total_amount }}</td>
                                       
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
