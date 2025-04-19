@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إدارة الصلاحيات</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">إضافة صلاحية جديدة</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection