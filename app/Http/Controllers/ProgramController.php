<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Program::all()->map(function ($schedule) {
            return [
                'title' => $schedule->course->name,
                'start' => $schedule->day . 'T' . $schedule->start_hour,
                'end' => $schedule->day . 'T' . $schedule->end_hour,
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'day' => 'required',
                'course' => 'required',
                'start_Hour' => 'required',
                'end_Hour' => 'required',
            ]);

            $program = new Program();
            $program->day = $request->day;
            $program->course = $request->course;
            $program->start_Hour = $request->start_Hour;
            $program->end_Hour = $request->end_Hour;
            $program->save();
            return redirect()->back()->with('message','Nouvel emploi de temps ajouté !!');

        }catch(\Exception $e){
            return redirect()->back()->with('message','Oups Erreur innatendue !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        try{
            $request->validate([
                'day' => 'required',
                'course' => 'required',
                'start_Hour' => 'required',
                'end_Hour' => 'required',
            ]);

            $program->day = $request->day;
            $program->course = $request->course;
            $program->start_Hour = $request->start_Hour;
            $program->end_Hour = $request->end_Hour;
            $program->save();
            return redirect()->back()->with('message','Emploi de temps modifié !!');

        }catch(\Exception $e){
            return redirect()->back()->with('message','Oups Erreur innatendue !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        try{
            $program->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('message','Oups Erreur innatendue !!');
        }
    }
}