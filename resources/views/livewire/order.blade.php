<section class="section">

    <table class="table datatable">
        <thead>
            <tr>
                <th>
                    <center>
                        <h2 style="font-weight: bold ">Place An Order</h2>
                    </center>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Place Order</h5>
                    <form method="POST" action="{{ url('admin/storeorder') }}" id="orderForm">
                        @csrf
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    {{-- <th scope="col">Flavour</th> --}}
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    {{-- <th scope="col">Discount(%)</th> --}}
                                    <th scope="col">Total</th>
                                    <th><button id="addRowButton" class="btn btn-success"><i
                                                class="bi bi-plus"></i></button></th>


                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                <!-- Initial row -->
                                <tr>

                                    <td>1</td>

                                    <td>
                                        <select name="product_id[]" id="product_id" class="form-select product_id"
                                             required>
                                            <option value="">Select a product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                    {{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    {{-- <td>
                                        <select class="form-select flavour" name="flavour[]">
                                            <option value="">Select a Flavour</option>
                                            @foreach ($flavour as $flavour)
                                                <option value="{{ $flavour->id }}">{{ $flavour->flavour_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td> --}}

                                    <td><input type="number" name="price[]" class="form-control price"
                                            placeholder="Price" wire:model="selectedProductPrice" required></td>
                                    <td><input type="number" name="quantity[]" class="form-control quantity"
                                            placeholder="Enter Quantity" required></td>
                                    {{-- <td><input type="number" name="discount[]" class="form-control discount"
                                            placeholder="discount"></td> --}}
                                    <td><input type="text" name="total_amount[]" class="form-control total_amount"
                                            placeholder="Total price" readonly></td>
                                    <td>
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                    {{-- <td><input type="hidden" name="product_id[]" class="form-control product"
                                            wire:model="selectedProductName" required> </td> --}}

                                </tr>

                            </tbody>

                        </table>
                        <div class="col-sm-3" style="float: right">
                            <label for="inputNanme4" class="form-label" style="font-weight: bold">Total Amount</label>
                            <input type="text" id="totalPrice" class="form-control" name="trans_amount" required>
                        </div>
                        <br>
                        
                        <legend class="card-title">Payment Method</legend>
                        <fieldset class="row mb-7">
                            <div class="col-sm-10">
                                <span class="form-check">
                                    <input class="form-check-input cash" type="radio" name="payment_method"
                                        id="payment_method" value="cash" required>
                                    <label class="form-check-label" for="payment_method">
                                        Cash Payment
                                    </label>
                                </span>
                                <span class="form-check">
                                    <input class="form-check-input bank" type="radio" name="payment_method"
                                        id="payment_method" value="online" required>
                                    <label class="form-check-label" for="payment_method">
                                        Online Payment
                                    </label>
                                </span>

                            </div>
                        </fieldset>
                        {{-- <br>
                        <legend class="card-title">Payment Method</legend>
                        <fieldset class="row mb-7">
                            <div class="col-sm-10">
                                <span class="form-check">
                                    <input class="form-check-input cash" type="radio" name="payment_method"
                                        id="payment_method" value="cash" required>
                                    <label class="form-check-label" for="payment_method">
                                        Cash / Cash on Delivery
                                    </label>
                                </span>
                                <span class="form-check">
                                    <input class="form-check-input bank" type="radio" name="payment_method"
                                        id="payment_method" value="bank" required>
                                    <label class="form-check-label" for="payment_method">
                                        Bank Transfer
                                    </label>
                                </span>

                            </div>
                        </fieldset>
                        <legend class="card-title">Status</legend>
                        <fieldset class="row mb-7">
                            <div class="col-sm-10">
                                <span class="form-check">
                                    <input class="form-check-input pick_up" type="radio" name="status" id="status"
                                        value="pick_up" required>
                                    <label class="form-check-label" for="status">
                                        Pick Up
                                    </label>
                                </span>
                                <span class="form-check">
                                    <input class="form-check-input delivery" type="radio" name="status"
                                        id="status" value="delivery" required>
                                    <label class="form-check-label" for="status">
                                        Delivery
                                    </label>
                                </span>

                            </div>
                        </fieldset> --}}


                        @livewire('customer')
                    </form>


                </div>
            </div>





        </div>
    </div>




</section>
