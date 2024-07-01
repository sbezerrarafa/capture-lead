<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:leads,email',
            'endereco' => 'nullable|string|max:255',
            'setor' => 'nullable|string|max:255',
        ]);

        $lead = Lead::create($data);

        return response()->json(['message' => 'Lead criado com sucesso!', 'lead' => $lead], 201);
    }
}
