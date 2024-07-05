<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;
use App\Models\Lead;

class CampanhasController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $campanhas = Campanha::where('user_id', $userId)->get();
        $leads = Lead::where('user_id', $userId)->select('hash_lista', 'lista_nome')->groupBy('hash_lista', 'lista_nome')->get();
//dd('campanhas: ',$campanhas, 'leads: ', $leads);
        return view('campanhas.index', compact('campanhas', 'leads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'canal' => 'required|string',
            'lead_id' => 'required|uuid|exists:leads,hash_lista',
        ]);

        $campanha = new Campanha([
            'user_id' => auth()->id(),
            'nome' => $request->nome,
            'conteudo' => $request->conteudo,
            'canal' => $request->canal,
            'lead_id' => $request->lead_id,
            'status' => 'Ativa',
        ]);

        $campanha->save();

        return redirect()->route('campanhas.index')->with('success', 'Campanha criada com sucesso!');
    }
}