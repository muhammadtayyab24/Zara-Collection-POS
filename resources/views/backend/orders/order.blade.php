@extends('backend.layout.main')
@section('main-container')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1> Place Order</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order Here</li>
                </ol>
            </nav>
        </div>
        @livewire('order')

    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var rowCounter = 2; // Start from 2 because 1 row is already there

            $('#addRowButton').on('click', function() {
                // Find the closest row to the clicked button
                var $closestRow = $(this).closest('tr');
                var productOptions = $('.product_id').html();
                // var flavourOptions = $('.flavour').html();


                var row = '<tr>' +
                    '<td class="row-number">' + rowCounter + '</td>' +
                    '<td>' +
                    '<select name="product_id[]" class="form-select product_id" required>' +
                    productOptions + '</select>' +
                    '</td>' +
                    // '<td>' +
                    // '<select name="flavour[]" class="form-select flavour">' + flavourOptions + '</select>' +
                    // '</td>' +
                    '<td><input type="number" name="price[]" class="form-control price" placeholder="Product Price" required></td>' +
                    '<td><input type="number" name="quantity[]" class="form-control quantity" placeholder="Enter Quantity" required></td>' +
                    // '<td><input type="number" name="discount[]" class="form-control discount" placeholder="discount"></td>' +
                    '<td><input type="text" name="total_amount[]" class="form-control total_amount" placeholder="Total price" readonly></td>' +
                    '<td><button class="btn btn-danger delete-row"><i class="bi bi-trash"></i></button></td>' ;
                '</tr>';

                $('.addMoreProduct').append(row);
                rowCounter++;
            });


            // Add a change event listener to dynamically populate the price
            $('.addMoreProduct').on('change', '.product_name', function() {
                var selectedProductId = $(this).val();
                var selectedProductname = $(this).find('option:selected').data('product');
                var row = $(this).closest('tr');
                if (selectedProductId) {
                    // Update the price input field in the same row
                    row.find('.product').val(selectedProductname);
                }
            });
            // Add a change event listener to dynamically populate the price
            $('.addMoreProduct').on('change', '.product_name', function() {
                var selectedProductId = $(this).val();
                var selectedProductPrice = $(this).find('option:selected').data('price');
                var row = $(this).closest('tr');
                if (selectedProductId) {
                    // Update the price input field in the same row
                    row.find('.price').val(selectedProductPrice);
                }
            });

            // Delete row
            $('.addMoreProduct').on('click', '.delete-row', function() {
                var row = $(this).closest('tr');
                var totalAmount = parseFloat(row.find('.total_amount').val()) || 0;
                var currentTotalPrice = parseFloat($('#totalPrice').val()) || 0;

                // Subtract the total amount of the deleted row from the current total price
                var newTotalPrice = (currentTotalPrice - totalAmount).toFixed(2);

                // Update the total price field
                $('#totalPrice').val(newTotalPrice);

                // Remove the row from the table
                row.remove();

                // Recalculate total price after row deletion
                calculateTotalPrice();
            });
            // Calculate total amount
            $('.addMoreProduct').on('input', '.price, .quantity, .discount', function() {
                var row = $(this).closest('tr');
                var price = parseFloat(row.find('.price').val()) || 0;
                var quantity = parseFloat(row.find('.quantity').val()) || 0;
                var discount = parseFloat(row.find('.discount').val()) || 0;

                // Calculate total after discount
                var totalAfterDiscount = (price * quantity * (1 - discount / 100)).toFixed(2);

                row.find('.total_amount').val(totalAfterDiscount);
                calculateTotalPrice();
            });

            // Function to calculate total price
            function calculateTotalPrice() {
                var totalPrice = 0;
                $('.addMoreProduct').find('.total_amount').each(function() {
                    var totalAmount = parseFloat($(this).val()) || 0;
                    totalPrice += totalAmount;
                });

                $('#totalPrice').val(totalPrice.toFixed(2));
            }

            // Initial calculation when the page loads
            calculateTotalPrice();

           

        });
        //  $(document).ready(function() {
        //         $('.form-select.product_id').select2();
        //     });
        //     $(document).ready(function() {
        //         $('.form-select.flavour').select2();
        //     });
    </script>
@endsection
