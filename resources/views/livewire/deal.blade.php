
<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Expense</h5>
                    {{-- @livewire('order') --}}
                    @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif

                    <form method="POST" action="{{ url('admin/storedeal') }}">
                        @csrf
                        
                    <table class="table datatable">
                       
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Expense</th>
                                <th scope="col">Price</th>
                                {{-- <th><a href="#"  class="add_more"></a> --}}
                                    {{-- <button type="button" wire:click="addItem">Add Item</button> --}}
                                {{-- </th> --}}

                               {{-- <th><a href="#" class="btn btn-success add_more"><i
                                            class="bi bi-plus"></i> Add Item </a></th> --}}
                                            <th>Action</th>
                                            

                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="col-sm-10">
                                        {{-- <select class="form-select product_id" wire:model="selectedProductId"  name="product_id[]" required>
                                            <option value="">Select a product</option>
                                            @foreach ($product as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select> --}}
                                        <input type="text" name="expense[]" id="expense" placeholder="expense"
                                        class="form-control expense" required>
                                    </div>
                                </td>

                                
                                <td>
                                    <div class="col-sm-10">
                                        <input type="number" name="price[]" id="price" placeholder="price"
                                            class="form-control price" required>
                                            
                                    </div>
                                </td>
                              
                                {{-- <td><a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a></td> --}}
                                <td> <button type="submit" class="btn btn-primary">Expense</button></td>
                            </tr>

                        </tbody>

                    </table>
                    {{-- <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><h5>Deal Name</h5></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputText" name="name" placeholder="Deal Name" required>
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    {{-- <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"><h5>Deal Price</h5></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputText" name="price" placeholder="Price" required>
                        </div>
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}} 

                    </form>

                </div>
            </div>

        </div>
    </div>
    

    {{-- <div>
        <select wire:model="selectedProductId">
            <option value="">Select a product</option>
            @foreach ($product as $product) 
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>

            @endforeach
        </select>
        <input type="number" wire:model="quantity">
        <input type="text" wire:model="selectedProductPrice">
        <input type="text" wire:model="total">
    </div> --}}
</section>




