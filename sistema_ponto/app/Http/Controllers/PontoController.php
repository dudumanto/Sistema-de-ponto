<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTimeLog;

class PontoController extends Controller
{
    public function marcarPonto(Request $request)
    {
        try {
            $userId = $request->userId;

            $userTimeLog = new UserTimeLog();
            $userTimeLog->user_id = $userId;
            $userTimeLog->entrada = now(); // Obtém o horário atual
            $userTimeLog->saida = null; // Define a saída como nula por enquanto
            $userTimeLog->save();

            return response()->json(['message' => 'Ponto marcado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao marcar o ponto: ' . $e->getMessage()], 500);
        }
    }
}
