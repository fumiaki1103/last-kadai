@extends('layouts.app')

@section('content')
<div class="container">
    <h1>出勤・退勤の打刻</h1>
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success" name="status" value="start">出勤</button>
        <button type="submit" class="btn btn-danger" name="status" value="end">退勤</button>
    </form>
    <br>
    <a href="{{ route('home') }}" class="btn btn-secondary">ホームに戻る</a>
</div>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection



