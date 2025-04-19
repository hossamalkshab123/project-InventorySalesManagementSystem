@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.admin_dashboard') }}</h2>
        </div>
        <div class="card-body">
            <!-- رسائل الترحيب -->
            <div class="welcome-message mb-4">
                <h3>{{ __('messages.welcome_back') }}, {{ Auth::user()->name }}!</h3>
                <p class="lead">{{ __('messages.dashboard_description') }}</p>
            </div>

            <!-- الإحصائيات -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">{{ __('messages.total_products') }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalProducts }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">{{ __('messages.total_sales') }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalSales }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">{{ __('messages.total_customers') }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $totalCustomers }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection