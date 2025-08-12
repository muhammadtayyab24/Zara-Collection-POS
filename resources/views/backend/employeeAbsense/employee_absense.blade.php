@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Absense</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Absense</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">Add Absense</h5>
                            </center>
                            @if (Session::has('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('admin/save-empAbsense') }}" id="orderForm">
                                @csrf
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Employee name</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Initial row -->
                                        <tr>

                                            <td>
                                                <select name="employee_id" id="employee_id" class="form-select employee_id"
                                                     required>
                                                    <option value="">Select a Employee</option>
                                                    @foreach ($employee as $product)
                                                        <option value="{{ $product->id }}" >
                                                            {{ $product->employee_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            
                                            {{-- <td><input type="text" name="absense" class="form-control absense"
                                                    placeholder="absense" required>
                                            </td> --}}
                                           <td><button type="submit" name="absense" value="Absent" class="btn btn-danger">Absent</button>
                                           <button type="submit" name="absense" value="Late" class="btn btn-warning">Late</button>
                                           <button type="submit" name="absense" value="Half Day" class="btn btn-success">Half Day</button></td>

                                           
                                        </tr>

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>

                        <div class="card">
                        <div class="card-body">
                             
                            <center>
                                <h5 class="card-title">Employee Absense</h5>
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
                                        <th scope="col">Employee name</th>
                                        <th scope="col">Absense</th>
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
                                            <td>
                                                @if ($data->employee)
                                                    {{ $data->employee->employee_name }}
                                                @else
                                                    Old Employee
                                                @endif
                                            </td>
                                            
                                            {{-- <td>{{ $data->absense }}</td> --}}
                                            <td>
                                                @if ($data->absense == 'Absent')
    <span class="badge bg-danger">{{ $data->absense }}</span>
@elseif ($data->absense == 'Late')
    <span class="badge bg-warning">{{ $data->absense }}</span>
@else
    <span class="badge bg-success">{{ $data->absense }}</span>
@endif
                                            </td>
                                            <td>{{ $data->date }}</td>
                                            <td>
                                                {{-- <a href="{{ url('admin/editempAbsense/' . $data->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit Balance Detail"><i
                                                        class="bi bi-pencil-fill"></i></a> --}}
                                                <a href="{{ url('admin/deleteempAbsense/' . $data->id) }}"
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
