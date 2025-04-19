@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">{{ __('messages.edit_user') }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="role">{{ __('messages.role') }}</label>
                    <select class="form-control" id="role" name="role" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> {{ __('messages.update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection