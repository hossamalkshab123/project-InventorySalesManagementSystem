@extends('layouts.app')

@section('title', __('messages.profile'))

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ __('messages.profile') }}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ __('messages.user_information') }}</h5>
            <p class="card-text"><strong>{{ __('messages.name') }}:</strong> {{ Auth::user()->name }}</p>
            <p class="card-text"><strong>{{ __('messages.email') }}:</strong> {{ Auth::user()->email }}</p>
            <p class="card-text"><strong>{{ __('messages.role') }}:</strong> {{ Auth::user()->getRoleNames()->first() }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> {{ __('messages.edit_profile') }}
            </a>
        </div>
    </div>
</div>
@endsection