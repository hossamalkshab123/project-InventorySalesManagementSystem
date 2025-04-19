@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_customer') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('messages.phone') }}</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection