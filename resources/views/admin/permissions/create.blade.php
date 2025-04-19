@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة صلاحية جديدة</h2>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم الصلاحية</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection