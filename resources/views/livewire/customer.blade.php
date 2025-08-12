<div class="pagetitle" style="margin-top: 40px">
    <h1> Customer Detail</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>Customer Phone No</th>
                <th>Customer Name</th>
                <th>Seller Name</th>

                {{-- <th>Customer Address</th> --}}
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputNanme4" wire:model="phone_number"
                            name="Customer_phone_no" placeholder="Ex: 033234253" value="00000" >
                    </div>
                </td>
                <td>
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputNanme4" wire:model="name"
                            name="Customer_name" placeholder="Full Name" value="walking Customer">
                    </div>
                </td>
                {{-- <td>
                    <div class="col-12">
                        <input type="text" class="form-control" id="inputNanme4" wire:model="address"
                            name="Customer_address" placeholder="Ex: block-2 near ..." required>
                    </div>
                </td> --}}
                <td>
                    <select name="seller_id" id="seller_id" class="form-select seller_id" required>
                        <option value="">Select Seller</option>
                        {{-- <option value="1">hello</option> --}}
                        @foreach ($employee as $product)
                        <option value="{{ $product->id }}" >
                            {{ $product->employee_name }}</option>
                    @endforeach
                    </select>
                    {{-- <input type="seller_id" name="seller_id" class="form-control" value="1"> --}}

                </td>
            </tr>
        </tbody>

    </table>

    <br>



    <br>
    <center><button type="submit" class="btn btn-primary" id="printReceiptButton">Save and Print</button></center>


</div>
