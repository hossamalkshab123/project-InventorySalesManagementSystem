@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.sales') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('sales.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus-circle"></i> {{ __('messages.add_sale') }}
            </a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('messages.product') }}</th>
                            <th>{{ __('messages.customer') }}</th>
                            <th>{{ __('messages.quantity') }}</th>
                            <th>{{ __('messages.total_price') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->customer->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ $sale->total_price }}</td>
                            <td>
                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>
                                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                        <i class="fas fa-trash-alt"></i> {{ __('messages.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection