
@extends('layouts.app')

@section('content')
<a href="{{ route('pos.index') }}"><button class="btn btn-primary">Go Back</button></a>
<a href="{{ route('products.index') }}"><button class="btn btn-primary">Product page</button></a>
    <div class="container">
        <h2>Invoices</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                   
                    <th>Discount (%)</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->customer_name }}</td>
                        <td>{{ $invoice->discount }}</td>
                        <td>
                            @if (!empty($invoice->selected_products))
                                <ul>
                                    @foreach ($invoice->selected_products as $product)
                                        <li>{{ $product }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No selected products
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
