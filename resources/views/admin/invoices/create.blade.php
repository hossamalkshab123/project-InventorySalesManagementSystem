@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">{{ __('messages.add_invoice') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="sale_id">{{ __('messages.sale') }}</label>
                    <select class="form-control" id="sale_id" name="sale_id" required>
                        @foreach($sales as $sale)
                        <option value="{{ $sale->id }}">{{ $sale->customer->name }} - {{ $sale->total_price }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="invoice_number">{{ __('messages.invoice_number') }}</label>
                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" required>
                </div>
                <div class="form-group mb-3">
                    <label for="total_amount">{{ __('messages.total_amount') }}</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" required>
                </div>
                <div class="form-group mb-3">
                    <label for="status">{{ __('messages.status') }}</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="unpaid">{{ __('messages.unpaid') }}</option>
                        <option value="paid">{{ __('messages.paid') }}</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.add') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection