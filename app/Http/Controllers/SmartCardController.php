<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Student;
use App\Models\SmartCard;
use Illuminate\Http\Request;

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
                return redirect()->back()->with('message', 'Nouvel etudiant actif!!');
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
                $mutual = Student::find($card->user_id);

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
}
