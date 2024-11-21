<?php

namespace App\Http\Controllers;

use App\Models\Softskill;
use Illuminate\Http\Request;

class SoftskillController extends Controller
{
    public function storeSoftSkill(Request $request){

        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado.'], 401);
        }

        $validated = $request->validate([
            'descricao' => 'required|string'
        ]);

        $validated['user_id'] = $user->id;

        Softskill::create($validated);

        return response()->json(['message' => 'Softskills adicionadas com sucesso!'], 201);
    }
}
