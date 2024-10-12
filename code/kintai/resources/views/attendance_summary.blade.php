@extends('layouts.app')

@section('content')
<div class="container">
    <h1>1か月の出退勤表</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>日付</th>
                <th>出勤時間</th>
                <th>退勤時間</th>
                <th>変更</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ \Carbon\Carbon::parse($attendance->timestamp)->format('Y-m-d') }}</td>
                <td>{{ $attendance->status == 'start' ? \Carbon\Carbon::parse($attendance->timestamp)->format('H:i:s') : '' }}</td>
                <td>{{ $attendance->status == 'end' ? \Carbon\Carbon::parse($attendance->timestamp)->format('H:i:s') : '' }}</td>
                <td>
                    <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-primary">変更</a>
                </td>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
</div>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
