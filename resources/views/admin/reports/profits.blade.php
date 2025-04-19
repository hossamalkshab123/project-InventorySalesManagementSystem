@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.profit_report') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.total_sales') }}</h5>
                            <p class="card-text display-6">{{ $totalSales }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.total_purchases') }}</h5>
                            <p class="card-text display-6">{{ $totalPurchases }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.total_profit') }}</h5>
                            <p class="card-text display-6">{{ $profit }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection