@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">{{ __('messages.sales_report') }}</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('messages.product') }}</th>
                            <th>{{ __('messages.total_sold') }}</th>
                            <th>{{ __('messages.total_revenue') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salesReport as $report)
                        <tr>
                            <td>{{ $report->product->name }}</td>
                            <td>{{ $report->total_sold }}</td>
                            <td>{{ $report->total_revenue }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection