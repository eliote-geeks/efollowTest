<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Course;
use App\Models\endSchedule;
use App\Models\Program;
use App\Models\Student;
use App\Models\Presence;
use App\Models\SmartCard;
use Illuminate\Http\Request;
use App\Models\StudentCourse;

class SmartCardController extends Controller
{
    public function addPostStudentCard(Request $request, Student $student)
    {
        try {
            $request->validate(
                [
                    'id_card_smart' => 'required|max:10|min:10',
                ],
                [
                    'id_card_smart.required' => 'Le champ carte à puce est obligatoire.',
                    'id_card_smart.max' => 'oups veuiller reesayer.',
                    'id_card_smart.min' => 'oups veuiller reesayer.',
                ],
            );
            $id = $this->remplace($request->id_card_smart);
            if (
                SmartCard::where([
                    'id_card_smart' => $id,
                ])->count() == 0
            ) {
                $card = new SmartCard();
                $card->id_card_smart = $id;
                $card->user_id = $student->id;
                $card->status = 'on';
                $card->save();
                return redirect()->route('etudiant.index')->with('message', 'Nouvel etudiant actif!!');
            } else {
                return redirect()->back()->with('message', 'Carte déja prise !!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'une erreur innatendue s\'est produite');
        }
    }

    public function remplace($texte)
    {
        $equivalences = [
            '&' => '1',
            'é' => '2',
            '"' => '3',
            "'" => '4',
            '(' => '5',
            '-' => '6',
            'è' => '7',
            '_' => '8',
            'ç' => '9',
            'à' => '0',
        ];

        $nouveau = str_replace(array_keys($equivalences), array_values($equivalences), $texte);

        return $nouveau;
    }

    public function searchByStudentCard(Request $request, Student $student)
    {
        try {
            $request->validate([
                'id_card_smart' => 'required|min:10|max:10',
            ]);

            $id = $this->remplace($request->id_card_smart);

            if (
                SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->count() > 0
            ) {
                $card = SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->firstOrFail();
                $student = Student::find($card->user_id);

                return redirect()->route('student.show', [
                    'student' => $student,
                ]);
            } else {
                return redirect()->back()->with('message', 'Etudiant non repertorié !');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produite');
        }
    }

    public function scheduleCard(Request $request, Student $student, Program $program)
    {
        try {
            $request->validate([
                'id_card_smart' => 'required|min:10|max:10',
            ]);

            $id = $this->remplace($request->id_card_smart);

            if (
                SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->count() > 0
            ) {
                $card = SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->firstOrFail();
                $student = Student::find($card->user_id);
                if (
                    Presence::where([
                        'program_id' => $program->id,
                        'student_id' => $student->id,
                    ])->count() == 0
                ) {
                    $presence = new Presence();
                    $presence->program_id = $program->id;
                    $presence->student_id = $student->id;
                    $presence->save();
                    return redirect()->back()->with('message', 'Etudiant Présent enregistré !!');
                } else {
                    return redirect()->back()->with('message', 'Etudiant déja enregistré !!');
                }

                return redirect()->route('student.show', [
                    'student' => $student,
                ]);
            } else {
                return redirect()->back()->with('message', 'Etudiant non repertorié !');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produite');
        }
    }

    public function addStudentCourseCard(Request $request, Student $student, Course $course)
    {
        try {
            $request->validate([
                'id_card_smart' => 'required|min:10|max:10',
            ]);

            $id = $this->remplace($request->id_card_smart);

            if (
                SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->count() > 0
            ) {
                $card = SmartCard::where([
                    'id_card_smart' => $id,
                    'status' => 'on',
                ])->firstOrFail();
                $student = Student::find($card->user_id);
                if (
                    StudentCourse::where([
                        'course_id' => $course->id,
                        'student_id' => $student->id,
                    ])->count() == 0
                ) {
                    $course_student = new StudentCourse();
                    $course_student->program_id = $course->id;
                    $course_student->student_id = $student->id;
                    $course_student->save();
                    return redirect()->back()->with('message', 'Etudiant Ajouté au cours !!');
                } else {
                    return redirect()->back()->with('message', 'Etudiant déja enregistré !!');
                }

                return redirect()->route('student.show', [
                    'student' => $student,
                ]);
            } else {
                return redirect()->back()->with('message', 'Etudiant non repertorié !');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produite');
        }
    }

    public function endListCardschedule(Program $program)
    {
        try {
            if (endSchedule::where('program_id', $program->id)->count() == 0) {
                $endschedule = new endSchedule();
                $endschedule->program_id = $program->id;
                $endschedule->status = 1;
                $endschedule->save();
            } else {
                return redirect()->back()->with('message', 'programme déja terminé');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Une erreur s\'est produite');
        }
    }

    public function createStudentCard(Student $student)
    {
        return view('card.create-student-card',[
            'student' => $student
        ]);
    }
}
