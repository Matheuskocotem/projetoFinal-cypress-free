<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function registerVacancy(Request $request){
        $array = $request->validate([
            'vacancy_name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'requirements' => 'required|string|max:255',
            'location' => 'required|string|max:100',
            'work_modality' => 'required|string|max:50',
            'creation_date' => 'required|date',
            'company' => 'required|string|max:100',
            'salary' => 'required|string|max:50',
            'company_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $array['recruiter_id'] = Auth::id();
        $vacancy = Vacancies::create($array);

        return response()->json([
            'message' => 'Vaga cadastrrada com sucesso! ',
            'vacancy'=>$vacancy,
            ]);

    }

    public function index_vacancies(){
        $vacancies = Vacancies::all();
        return response()->json([
            'message' => 'Lista de vagas encontrada com sucesso!',
            'vacancies' => $vacancies,

        ]);
    }

    public function updateVacancy(Request $request, $id){
        $array = $request->validate([
            'vacancy_name' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'requirements' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:100',
            'work_modality' => 'nullable|string|max:50',
            'creation_date' => 'nullable|date',
            'company' => 'nullable|string|max:100',
            'salary' => 'nullable|string|max:50',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $array['recruiter_id'] = Auth::id();

        $vacancy = Vacancies::find($id);

        $vacancy->update($array);

        return response()->json([
            'message' => 'Vaga atualizada com sucesso!',
            'vacancy' => $vacancy,
        ]);

}
}
