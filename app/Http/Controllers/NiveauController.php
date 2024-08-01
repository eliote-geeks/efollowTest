<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\Specialite;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::latest()->get();
        $specialites = Specialite::all();
        return view('level.level-list',[
            'niveaux' => $niveaux,
            'specialites' => $specialites,
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
            $request->validate([
                'name' => 'required',
                'specialite' => 'required|integer',
            ]);
            $niveau = new Niveau();
            $niveau->name = $request->name;
            $niveau->specialite_id = $request->specialite;
            $niveau->save();
            return redirect()->back()->with('message', 'Niveau Ajoutée avec success !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'une Erreur innatendue s\'est produite !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niveau $niveau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Niveau $niveau)
    {
        try {
            $request->validate([
                'name' => 'required',
                'specialite' => 'required|integer|exists:specialites',
            ]);
            $niveau->name = $request->name;
            $niveau->specialty_id = $request->specialite;
            $niveau->save();
            return redirect()->back()->with('message', 'Niveau Modifiée avec success !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'une Erreur innatendue s\'est produite !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return redirect()->back()->with('message','Niveau retiré avec succes !!');
    }
}
