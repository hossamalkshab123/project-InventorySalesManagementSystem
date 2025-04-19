@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل الصلاحية</h2>
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم الصلاحية</label>
            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection