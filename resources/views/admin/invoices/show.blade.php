@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">{{ __('messages.invoice_details') }}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ __('messages.invoice_number') }}: <strong>{{ $invoice->invoice_number }}</strong></h5>

            {{-- تحقق من وجود العلاقة 'sale' ومن ثم 'customer' --}}
            @if ($invoice->sale && $invoice->sale->customer)
                <p class="card-text">{{ __('messages.customer') }}: <strong>{{ $invoice->sale->customer->name }}</strong></p>
            @else
                <p class="card-text text-danger">{{ __('messages.customer_not_found') }}</p>
            @endif

            <p class="card-text">{{ __('messages.total_amount') }}: <strong>{{ $invoice->total_amount }}</strong></p>
            <p class="card-text">{{ __('messages.status') }}: 
                <span class="badge {{ $invoice->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                    {{ $invoice->status }}
                </span>
            </p>

            <div class="mt-4">
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                </a>
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection