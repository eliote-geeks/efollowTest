<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;

class SesionController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Sesion::latest()->get();
        return view('session.session',[
            'sessions' => $sessions,
        ]);
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
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'start' => 'required|date',
                    'end' => 'required|date|after:start',
                ],
                [
                    'name.required' => 'Le champ nom ne peut rester vide',
                    'start.required' => 'Le champ date de debut de la session ne peut rester vide',
                    'start.date' => 'Le champ date de debut de la session doit etre une date',
                    'end.required' => 'Le champ date de fin de la session ne peut rester vide',
                    'end.date' => 'Le champ date de fin de la session doit etre une date',
                    'end.after' => 'Le champ date de fin de la session doit etre une date après la date de debut',
                ],
            );

            $session = new Sesion();
            $session->name = $request->name;
            $session->start = $request->start;
            $session->end = $request->end;
            $session->save();
            return redirect()->back()->with('message', 'Session Créée');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produiite !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sesion $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesion $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesion $session)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'start' => 'required|date',
                    'end' => 'required|date|after:start',
                ],
                [
                    'name.required' => 'Le champ nom ne peut rester vide',
                    'start.required' => 'Le champ date de debut de la session ne peut rester vide',
                    'start.date' => 'Le champ date de debut de la session doit etre une date',
                    'end.required' => 'Le champ date de fin de la session ne peut rester vide',
                    'end.date' => 'Le champ date de fin de la session doit etre une date',
                    'end.after' => 'Le champ date de fin de la session doit etre une date après la date de debut',
                ],
            );

            $session->name = $request->name;
            $session->start = $request->start;
            $session->end = $request->end;
            $session->save();
            return redirect()->back()->with('message', 'Session mise à jour');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produiite !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesion $session)
    {
        try{
            $session->delete();
            return redirect()->back()->with('message','session supprimée !!');
        }catch(\Exception $e){
            return redirect()->back()->with('message','Oups une erreur s\'est produite');
        }
    }
}
