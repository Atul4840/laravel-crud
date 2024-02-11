
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Product Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Brand Name:</strong> {{ $product->brand_name }}</p>
                <p class="card-text"><strong>Cost Price:</strong> ${{ $product->cost_price }}</p>
                <p class="card-text"><strong>Sell Price:</strong> ${{ $product->sell_price }}</p>

                <!-- Add more details as needed -->

                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
            </div>
        </div>
    </div>
@endsection
