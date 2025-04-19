@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_product') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="price">{{ __('messages.price') }}</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">{{ __('messages.quantity') }}</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="category">{{ __('messages.category') }}</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $product->category }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="supplier_id">{{ __('messages.supplier') }}</label>
                    <select class="form-control" id="supplier_id" name="supplier_id" required>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection