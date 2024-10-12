<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // 出勤・退勤の打刻ページ
    public function create()
    {
        return view('attendance');
    }

    // 出勤・退勤のデータを保存
    public function store(Request $request)
    {
        $user = Auth::user();
        $status = $request->input('status');
        $currentTime = Carbon::now();

        // 出勤・退勤データを保存
        $attendance = new Attendance();
        $attendance->user_id = $user->id;
        $attendance->status = $status;
        $attendance->timestamp = $currentTime;
        $attendance->save();

        // ステータスメッセージを設定
        $message = $status == 'start' ? '出勤しました。' : '退勤しました。';

        return redirect()->route('attendance.summary')->with('status', $message . ' 時刻: ' . $currentTime->toDateTimeString());
    }

    // 1か月の出退勤表のページ
    public function index()
    {
        $user = Auth::user();
        $attendances = Attendance::where('user_id', $user->id)->get();
        return view('attendance_summary', compact('attendances'));
    }

    // 出退勤データの編集ページ
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendance_edit', compact('attendance'));
    }

    // 出退勤データの更新
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->status = $request->input('status');
        $attendance->timestamp = $request->input('timestamp');
        $attendance->save();

        return redirect()->route('attendance.summary')->with('status', '出退勤データが更新されました。');
    }
}
