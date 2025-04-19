@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.invoices') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('invoices.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus-circle"></i> {{ __('messages.add_invoice') }}
            </a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('messages.invoice_number') }}</th>
                            <th>{{ __('messages.customer') }}</th>
                            <th>{{ __('messages.total_amount') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>
                                @if(optional($invoice->sale)->customer)
                                    {{ $invoice->sale->customer->name }}
                                @else
                                    <span class="text-danger">{{ __('messages.no_customer') }}</span>
                                @endif
                            </td>

                            <td>{{ $invoice->total_amount }}</td>
                            <td>
                                <span class="badge {{ $invoice->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $invoice->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> {{ __('messages.view') }}
                                </a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
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