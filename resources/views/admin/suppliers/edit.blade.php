@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_supplier') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contact_info">{{ __('messages.contact_info') }}</label>
                    <input type="text" class="form-control" id="contact_info" name="contact_info" value="{{ $supplier->contact_info }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection