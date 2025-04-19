@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_purchase') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('purchases.update', $purchase->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="product_id">{{ __('messages.product') }}</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $purchase->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="supplier_id">{{ __('messages.supplier') }}</label>
                    <select class="form-control" id="supplier_id" name="supplier_id" required>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">{{ __('messages.quantity') }}</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $purchase->quantity }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="price">{{ __('messages.price') }}</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $purchase->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection