<!-- resources/views/pos/index.blade.php -->

@extends('layouts.app')

@section('content')
<!-- Display flash success message -->
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
   <a href="{{ route('pos.invoices') }}"><button class="btn btn-primary"> View Invoices</button></a>
    <div class="container">
        <h2>Point of Sale (POS)</h2>

        <form action="{{ route('pos.saveTransaction') }}" method="post">
            @csrf
            <input type="hidden" name="selected_products_hidden[]" id="selected-products-hidden">

            <!-- Customer Selection Dropdown -->
            <div class="mb-3">
                <label for="customer" class="form-label">Select Customer:</label>
                <select class="form-select" id="customer" name="customer">
                    <option value="Customer1">Customer1</option>
                    <option value="Customer2">Customer2</option>
                    <option value="Customer3">Customer3</option>
                </select>
            </div>

            <!-- Product Search and Addition -->
            <div class="mb-3">
                <label for="product-search" class="form-label">Product Search:</label>
                
                <input type="text" class="form-control" name="selected_products[]"  id="product-search" placeholder="Search products..." value="">

                
                <div id="search-results"></div>
            </div>

            <!-- Selected Products Section -->
            <div class="mb-3">
                <h4>Selected Products</h4>
                <ul id="selected-products"></ul>
            </div>

            <!-- Discount Application -->
            <div class="mb-3">
                <label for="discount" class="form-label">Apply Discount (%):</label>
                <input type="number" class="form-control" id="discount" name="discount" min="0" max="100">
                <!-- Add logic for applying discounts to the transaction -->
            </div>

            <!-- Transaction Summary -->
            <!-- Add a section to display the selected customer, products, and applied discounts -->

            <!-- Save Button -->
            <button type="submit" class="btn btn-primary">Save Transaction</button>
        </form>

    </div>

    <script>
        // JavaScript code for product search and addition
        document.addEventListener('DOMContentLoaded', function () {
            const productSearchInput = document.getElementById('product-search');
            const searchResultsContainer = document.getElementById('search-results');
            const selectedProductsContainer = document.getElementById('selected-products');
            const sel_pro = document.getElementById('selected-products-hidden');
            const saveTransactionButton = document.getElementById('save-transaction');
            const selectedProducts = []; // Array to store selected products
    
            productSearchInput.addEventListener('input', function () {
                const searchTerm = productSearchInput.value.toLowerCase();
    
                // Perform product search (you may need to adjust this based on your actual data structure)
                const searchResults = @json($products->toArray()).filter(product => {
                    return product.name.toLowerCase().includes(searchTerm);
                });
    
                // Display search results
                searchResultsContainer.innerHTML = '';
                searchResults.forEach(result => {
                    const listItem = document.createElement('li');
                    listItem.textContent = result.name;
                    listItem.addEventListener('click', function () {
                        // Add selected product to the array
                        selectedProducts.push(result.name);
                       // sel_pro.value = selectedProducts;
                        // Update the list of selected products
                        updateSelectedProductsList();
    
                        // Fill the input field with the selected product's name
                        sel_pro.value = selectedProducts;
    
                        // Clear search results
                        searchResultsContainer.innerHTML = '';
                    });
                    searchResultsContainer.appendChild(listItem);
                });
            });
    
            function updateSelectedProductsList() {
                selectedProductsContainer.innerHTML = '';
                selectedProducts.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.textContent = product;
                    selectedProductsContainer.appendChild(listItem);
                });
            }
        });
    </script>
    
@endsection
