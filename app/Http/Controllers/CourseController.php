<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
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
                    'niveau' => 'required',
                    'teacher' => 'required',
                    'session' => 'required',
                    'slug' => 'required',
                    'name' => 'required',
                ],
                [
                    'niveau.required' => 'Le champ niveau ne peut etre vide',
                    'teacher.required' => 'Le champ enseignant ne peut etre vide',
                    'session.required' => 'Le champ session ne peut etre vide',
                    'slug.required' => 'Le champ code cours ne peut etre vide',
                    'name.required' => 'Le champ nom de cours ne peut etre vide',
                ],
            );

            $course = new Course();
            $course->niveau_id = $request->niveau;
            $course->teacher_id = $request->teacher;
            $course->session_id = $request->session;
            $course->slug = $request->slug;
            $course->name = $request->name;
            $course->save();
            return redirect()->back()->with('message', 'nouveau cours ajouté !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Oups une erreur innatendue s\'est produite !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        try {
            $request->validate(
                [
                    'niveau' => 'required',
                    'teacher' => 'required',
                    'session' => 'required',
                    'slug' => 'required',
                    'name' => 'required',
                ],
                [
                    'niveau.required' => 'Le champ niveau ne peut etre vide',
                    'teacher.required' => 'Le champ enseignant ne peut etre vide',
                    'session.required' => 'Le champ session ne peut etre vide',
                    'slug.required' => 'Le champ code cours ne peut etre vide',
                    'name.required' => 'Le champ nom de cours ne peut etre vide',
                ],
            );

            $course->niveau_id = $request->niveau;
            $course->teacher_id = $request->teacher;
            $course->session_id = $request->session;
            $course->slug = $request->slug;
            $course->name = $request->name;
            $course->save();
            return redirect()->back()->with('message', 'cours modifié avec success !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Oups une erreur innatendue s\'est produite !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try{
            $course->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('message','Oups une erreur innatendue s\'est produite');
        }
    }
}
