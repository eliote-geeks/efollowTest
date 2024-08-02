<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Program;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generateReportPresence(Request $request)
    {
        $request->validate([
            'period' => 'required|in:week,month,custom',
            // 'start_date' => 'required_if:period,custom|date',
            // 'end_date' => 'required_if:period,custom|date|after_or_equal:start_date',
        ]);

        $programs = [];

        if ($request->period == 'week') {
            $start_date = Carbon::now()->startOfWeek();
            $end_date = Carbon::now()->endOfWeek();
        } elseif ($request->period == 'month') {
            $start_date = Carbon::now()->startOfMonth();
            $end_date = Carbon::now()->endOfMonth();
        } else {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
        }

        $programs =Program::whereBetween('start_Hour', [$start_date, $end_date])->with('presence')->get();

        if ($request->has('start_date') && $request->has('end_date')) {
            $programs->whereBetween('day', [$request->start_date, $request->end_date]);
        }

        $pdf = PDF::loadView('presence.pdf', compact('programs'))
        ->setPaper('a4', 'Paysage');
        return $pdf->download('presence.programs.pdf');
    }


    public function generateReportAbsence(Request $request)
    {
        $request->validate([
            'period' => 'required|in:week,month,custom',
            // 'start_date' => 'required_if:period,custom|date',
            // 'end_date' => 'required_if:period,custom|date|after_or_equal:start_date',
        ]);

        $programs = [];

        if ($request->period == 'week') {
            $start_date = Carbon::now()->startOfWeek();
            $end_date = Carbon::now()->endOfWeek();
        } elseif ($request->period == 'month') {
            $start_date = Carbon::now()->startOfMonth();
            $end_date = Carbon::now()->endOfMonth();
        } else {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
        }

        $programs =Program::whereBetween('start_Hour', [$start_date, $end_date])->with('absence')->get();

        if ($request->has('start_date') && $request->has('end_date')) {
            $programs->whereBetween('day', [$request->start_date, $request->end_date]);
        }

        $pdf = PDF::loadView('absence.pdf', compact('programs'))
        ->setPaper('a4', 'Paysage');
        return $pdf->download('absence.programs.pdf');
    }
}
