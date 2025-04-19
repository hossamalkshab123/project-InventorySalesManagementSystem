<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">{{ __('messages.email') }}</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('messages.add') }}</button>
</form>