@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_sale') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.update', $sale->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="product_id">{{ __('messages.product') }}</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="customer_id">{{ __('messages.customer') }}</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">{{ __('messages.quantity') }}</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $sale->quantity }}" min="1" required>
                </div>
                <div class="form-group mb-3">
                    <label for="total_price">{{ __('messages.total_price') }}</label>
                    <input type="number" class="form-control" id="total_price" name="total_price" step="0.01" min="0" value="{{ $sale->total_price }}" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection