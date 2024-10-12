@extends('layouts.app')

@section('content')
<div class="container">
    <h1>出退勤データの編集</h1>
    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('ステータス') }}</label>
            <div class="col-md-6">
                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                    <option value="start" {{ $attendance->status == 'start' ? 'selected' : '' }}>出勤</option>
                    <option value="end" {{ $attendance->status == 'end' ? 'selected' : '' }}>退勤</option>
                </select>

                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="timestamp" class="col-md-4 col-form-label text-md-end">{{ __('タイムスタンプ') }}</label>
            <div class="col-md-6">
                <input id="timestamp" type="datetime-local" class="form-control @error('timestamp') is-invalid @enderror" name="timestamp" value="{{ \Carbon\Carbon::parse($attendance->timestamp)->format('Y-m-d\TH:i') }}" required>

                @error('timestamp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('更新') }}
                </button>
            </div>
        </div>
    </form>
    <br>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
</div>
@endsection

@section('styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
