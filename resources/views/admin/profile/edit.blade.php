@extends('layouts.app')

@section('title', __('messages.edit_profile'))

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_profile') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">{{ __('messages.new_password') }} ({{ __('messages.optional') }})</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">{{ __('messages.confirm_password') }}</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('messages.save_changes') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection