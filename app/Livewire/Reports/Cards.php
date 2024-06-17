<?php

namespace App\Livewire\Reports;

use App\Models\Disposition;
use Carbon\Carbon;
use Livewire\Component;

class Cards extends Component
{
    public $user_id;
    public function render()
    {
        $currentYearTotalTime = Disposition::where('user_id', '=', $this->user_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_time');
        $hours = floor($currentYearTotalTime / 3600);
        $minutes = floor(($currentYearTotalTime % 3600) / 60);
        $remainingSeconds = $currentYearTotalTime % 60;
        $currentYearTotalTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $remainingSeconds);

        $currentMonthTotalTime = Disposition::where('user_id', '=', $this->user_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_time');
        $hours = floor($currentMonthTotalTime / 3600);
        $minutes = floor(($currentMonthTotalTime % 3600) / 60);
        $remainingSeconds = $currentMonthTotalTime % 60;
        $currentMonthTotalTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $remainingSeconds);

        $currentWeekTotalTime = Disposition::where('user_id', '=', $this->user_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('created_at', '>=', Carbon::now()->startOfWeek())
            ->where('created_at', '<=', Carbon::now()->endOfWeek())
            ->sum('total_time');
        $hours = floor($currentWeekTotalTime / 3600);
        $minutes = floor(($currentWeekTotalTime % 3600) / 60);
        $remainingSeconds = $currentWeekTotalTime % 60;
        $currentWeekTotalTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $remainingSeconds);

        $todayTotalTime = Disposition::where('user_id', '=', $this->user_id)
            ->whereDate('created_at', Carbon::today())
            ->sum('total_time');
        $hours = floor($todayTotalTime / 3600);
        $minutes = floor(($todayTotalTime % 3600) / 60);
        $remainingSeconds = $todayTotalTime % 60;
        $todayTotalTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $remainingSeconds);
        return view('livewire.reports.cards', [
            'totalYear' => $currentYearTotalTime,
            "timeMonth" => $currentMonthTotalTime,
            "timeWeek" => $currentWeekTotalTime,
            'todayTime' => $todayTotalTime,
            "year" => Carbon::now()->year,
            "month" => Carbon::now()->monthName,
        ]);
    }
}
