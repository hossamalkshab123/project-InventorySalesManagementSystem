@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">{{ __('messages.add_sale') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="product_id">{{ __('messages.product') }}</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        <option value="">{{ __('messages.select_product') }}</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="customer_id">{{ __('messages.customer') }}</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        <option value="">{{ __('messages.select_customer') }}</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">{{ __('messages.quantity') }}</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                </div>
                <div class="form-group mb-3">
                    <label for="total_price">{{ __('messages.total_price') }}</label>
                    <input type="number" class="form-control" id="total_price" name="total_price" step="0.01" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.add') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection