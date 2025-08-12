<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Revenue</h5>  
            <form method="get" action="#">
              <button type="submit" name="year">Year</button>
            </form>
           
            <button >Month</button>          
            <button>Day</button>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">items</th>
                  <th scope="col">Payment Method</th>
                  <th scope="col">Admin name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp

                <tr>
                    <td>{{ $i }}</td>
                    <td>Deal 1</td>
                    <td>Cash</td>
                    <td>ashir</td>
                    <td>25-8-2023</td>
                    <td>2000</td>
                </tr>
                {{-- @foreach ($trans as $data)
                  
               
                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $data->order_id }}</td>
                  <td>{{ $data->payment_method }}</td>
                  <td>{{ $data->user->name }}</td>
                  <td>{{ $data->trans_date }}</td>
                  <td>{{ $data->trans_amount }}</td>
                  
                  <td><a href="{{ url('admin/edituser/'.$data->id) }}" class="btn btn-primary btn-sm" title="Edit User profile"><i class="bi bi-upload"></i></a>
                    <a href="{{ url('admin/deleteuser/'.$data->id) }}" class="btn btn-danger btn-sm" title="Delete My Account"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach --}}
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
{{-- testing --}}
<!-- resources/views/livewire/yearly-transactions.blade.php -->

<div>
  <select wire:model="selectedYear">
      <!-- Generate a list of years you want to display -->
      @for ($year = date('Y'); $year >= 2000; $year--)
          <option value="{{ $year }}">{{ $year }}</option>
      @endfor
  </select>

  <button wire:click="showTransactions">Show Transactions</button>

  @if ($transactions)
      <h2>Transactions for {{ $selectedYear }}</h2>
      <ul>
          @foreach ($transactions as $transaction)
              <li>{{ $transaction->name }} - {{ $transaction->trans_amount }}</li>
          @endforeach
      </ul>
  @endif
</div>

{{-- end -testing --}}
      </div>
    </div>

  </section>



  

