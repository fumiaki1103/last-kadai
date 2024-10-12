@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お疲れ様です') }}</div>

                <div class="card-body">
                    {{ __('') }}

                    <div class="mt-3">
                        <a href="{{ route('attendance') }}" class="btn btn-primary">出勤・退勤の打刻</a>
                        <a href="{{ route('attendance.summary') }}" class="btn btn-secondary">1か月の出退勤表</a>
                    </div>

                    <br>
                    <a href="{{ route('login') }}" class="btn btn-secondary">トップ画面に戻る</a> <!-- トップ画面に戻るリンクを追加 -->
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
