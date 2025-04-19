@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.purchases') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('purchases.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus-circle"></i> {{ __('messages.add_purchase') }}
            </a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('messages.product') }}</th>
                            <th>{{ __('messages.supplier') }}</th>
                            <th>{{ __('messages.quantity') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->product->name }}</td>
                            <td>{{ $purchase->supplier->name }}</td>
                            <td>{{ $purchase->quantity }}</td>
                            <td>{{ $purchase->price }}</td>
                            <td>
                                <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>
                                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="d-inline">
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