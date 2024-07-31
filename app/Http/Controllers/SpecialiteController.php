<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Exception;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'name' => 'required|unique:specialites',
            ]);

            $specialite = new Specialite();
            $specialite->name = $request->name;
            $specialite->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Oups une erreur innatendue s\'est produite');
        }

        return redirect()->back()->with('message', 'Specialité Ajoutée avec success !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialite $specialite)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            if (Specialite::where('name', $specialite->name)->count() == 0) {
                $specialite->name = $request->name;
                $specialite->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Oups une erreur innatendue s\'est produite');
        }

        return redirect()->back()->with('message', 'Specialité Ajoutée avec success !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();
        return redirect()->back()->with('message','Specialité Détruite avec success !!');
    }
}
