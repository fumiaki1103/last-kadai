@extends('layouts.app')

@section('content')
<div class="container">
    <h1>社員の条件入力</h1>
    <form action="{{ route('employee_conditions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">社員ID</label>
            <input type="text" id="employee_id" name="employee_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="condition">条件</label>
            <textarea id="condition" name="condition" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">保存</button>
    </form>
</div>
@endsection
