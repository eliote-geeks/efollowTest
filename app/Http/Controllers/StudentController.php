<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\SmartCard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->get();
    }

    public function addGetStudentCard(Student $student)
    {
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
                'firstName' => 'required',
                'lastName' => 'required',
                'birth_date' => 'required|date',
            ]);

            $user = new User();
            $user->name = $request->first;
            $user->email = $request->last . rand(0, 1000000) . @'ggmail' . rand(uniqid(), uniqid());
            $user->password = '£1';
            $user->user_type = 'App\Models\Student';
            $user->save();

            $student = new Student();
            $student->user_id = $user->id;
            $student->matricular = date('Y') .Str::limit($request->first,3) .strtoupper(uniqid());
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->birth_date = $request->birth_date;
            $student->save();
            return redirect()->back()->with('message', 'Etudiant Ajouté !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'oups Une erreur innatendue s\'est produite');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        try {
            $request->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'birth_date' => 'required|date',
            ]);

            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->birth_date = $request->birth_date;
            $student->save();
            return redirect()->back()->with('message', 'Etudiant Edité !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'oups Une erreur innatendue s\'est produite');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('message', 'Etudiant Retiré !!');
    }
}
