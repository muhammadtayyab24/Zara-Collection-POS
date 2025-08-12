@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Employees</li>
                    <li class="breadcrumb-item active">All Employees</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">All Employees</h5>
                            <a href="{{ url('admin/addemployee') }}"><button type="#" class="btn btn-primary">Add New
                                    Employees</button></a>
                            <!-- Table with stripped rows -->
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        {{-- <th scope="col">image</th> --}}
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Commission(%)</th>
                                        <th scope="col">Salary</th>
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

                                            {{-- <td> <img src="{{ asset('storage/'.$data->image) }}" width="50px" alt="Image"></td> --}}

                                            <td>{{ $data->employee_name }}</td>
                                            <td>{{ $data->phone_no }}</td>
                                            <td>{{ $data->commission }}%</td>
                                            <td>{{ $data->salary }}</td>

                                            <td>{{ $data->created_at }}</td>

                                            <td><a href="{{ url('admin/editemployee/' . $data->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit employee Detail"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="{{ url('admin/deleteemployee/' . $data->id) }}"
                                                    class="btn btn-danger btn-sm" title="Delete employee"><i
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
        <!-- resources/views/employee_sales/index.blade.php -->
        {{-- @livewire('employee-sales') --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 style="text-align: center" class="card-title">WeeKly Total Sale Commission</h5>
                            <!-- Table with stripped rows -->
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                        <th>Employee</th>
                                        <th>Total Sales</th>
                                        <th>Commission(%)</th>
                                        <th>Total Amount</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                  
                                    @foreach ($weeklySales as $sale)
                                        <tr>
                                            <td>{{$i++ }}</td>
                                            <td>{{ $sale->employee_name }}</td>
                                            <td>{{ $sale->total_sales }}</td>
                                            <td>{{ $sale->commission }}%</td>
                                            <td>{{ $sale->total_sales * ($sale->commission / 100) }}</td>
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


@section('scripts')
<!-- Include JavaScript -->
<script>
  // Listen for changes in commission inputs
  document.addEventListener('input', function (e) {
      if (e.target.classList.contains('commission-input')) {
          // Get the associated commission deduction input
          const commissionDeductionInput = e.target.closest('tr').querySelector('.commission-deduction-input');
          
          // Calculate and update the commission deduction value
          const totalSales = parseFloat(e.target.closest('tr').querySelector('td:nth-child(2)').innerText);
          const commission = parseFloat(e.target.value);
          const commissionDeduction = (totalSales * commission) / 100;
          commissionDeductionInput.value = commissionDeduction.toFixed(2); // Round to 2 decimal places
      }
  });
</script>

@endsection
