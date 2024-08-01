<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Niveau;
use App\Models\Absence;
use App\Models\Presence;
use App\Models\Student;
use App\Models\SmartCard;
use App\Models\Specialite;
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
        return view('etudiant.etudiant',[
            'students' => $students,
            'specialities' => Specialite::all()
        ]);
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
                'name' => 'required',
                'niveau' => 'required|integer',
                'birth_date' => 'required|date',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->name . rand(0, 1000000) . @'ggmail' .uniqid();
            $user->password = '£1';
            $user->user_type = 'App\Models\Student';
            $user->save();

            $matricular = date('Y') .Str::limit($request->first,3) .strtoupper(uniqid());
            if(Student::where([
                'matricular' =>  $matricular,
                'first_name' => $request->name,
            ])->count() == 0){
            $student = new Student();
            $student->user_id = $user->id;
            $student->matricular = $matricular;
            $student->firstName = $request->name;
            $student->lastName = $request->name;
            $student->birth_date = $request->birth_date;
            $student->niveau_id = $request->niveau;
            $student->save();
            
            return redirect()->route('addGetStudentCard',[
                'student' => $student
            ]);
        }else{
            return redirect()->back()->with('message', 'Matricule existant creer a nouveau cet utilisateur !!');
        }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'oups Une erreur innatendue s\'est produite');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $absences = Absence::where('student_id',$student->id)->get();
        $presences = Presence::where('student_id',$student->id)->get();
        return view('etudiant.profil',compact('student','absences','presences'));
    }

    public function see(Student $student)
    {
        $absences = Absence::where('student_id',$student->id)->get();
        $presences = Presence::where('student_id',$student->id)->get();
        return view('etudiant.profil',compact('student','absences','presences'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    public function getLevelsBySpeciality($specialityId)
    {
        $levels = Niveau::where('specialite_id',$specialityId)->pluck('name', 'id');
        return response()->json($levels);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        try {
            $request->validate([
                'name' => 'required',
                'birth_date' => 'required|date',
            ]);

            $student->firstName = $request->name;
            $student->lastName = $request->name;
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
