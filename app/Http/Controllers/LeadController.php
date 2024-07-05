<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $leads = Lead::where('user_id', auth()->id())
            ->select('hash_lista', 'lista_nome', DB::raw('MAX(created_at) as created_at'), DB::raw('count(*) as total'))
            ->groupBy('hash_lista', 'lista_nome')
            ->orderBy('lista_nome')
            ->get();
    
        return view('leads.index', compact('leads'));
    }

    public function store(Request $request)
    {
       //dd($request->all());
        Log::info('Request recebido:', $request->all());
    
        try {
            $validatedData = $request->validate([
                'lista_nome' => 'required|string|max:255',
                'selected_places' => 'required|string'
                // 'selected_places' => 'required|array',
                // 'selected_places.*.name' => 'required|string|max:255',
                // 'selected_places.*.formatted_phone_number' => 'nullable|string|max:20',
                // 'selected_places.*.formatted_address' => 'nullable|string|max:255',
                // 'selected_places.*.rating' => 'nullable|numeric',
                // 'selected_places.*.website' => 'nullable|string|max:255',
                // 'selected_places.*.url' => 'nullable|string|max:255',
                // 'selected_places.*.geometry.location.lat' => 'nullable|numeric',
                // 'selected_places.*.geometry.location.lng' => 'nullable|numeric',
                // 'selected_places.*.types' => 'nullable|array',
                // 'selected_places.*.types.*' => 'nullable|string|max:255',
            ]);
            
            $leads = json_decode($request->selected_places);

            Log::info('Dados validados:', $validatedData);
        
            $listaNome = $validatedData['lista_nome'];
            $hashLista = (string) Str::uuid();
            $userId = auth()->id();

            foreach ($leads as $place) {
                $leadData = [
                    'user_id' => $userId,
                    'hash_lista' => $hashLista,
                    'nome' => $place->name,
                    'telefone' => $place->formatted_phone_number,
                    'endereco' => $place->formatted_address,
                    'setor' => implode(', ', $place->type ?? []),
                    'lista_nome' => $listaNome,
                    'rating' => $place->rating ?? null,
                    'website' => $place->website ?? null,
                    'url' => $place->url ?? null,
                    'latitude' => $place->geometry->location->lat ?? null,
                    'longitude' => $place->geometry->location->lng ?? null,
                ];
                Lead::create($leadData);
            }
        
            return redirect()->route('leads.index')->with('success', 'Lista criada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao validar ou criar lead:', ['exception' => $e]);
           return redirect()->route('search.places')->with('error', 'Ocorreu um erro ao criar a lista.');
           //return response()->json(['error' => 'Mensagem de erro aqui.'], 400);

        }
    }

    public function edit($hash_lista)
    {
        $leads = Lead::where('hash_lista', $hash_lista)->get();
        return view('leads.edit', compact('leads'));
    }

    public function update(Request $request, $hash_lista)
    {
        $validatedData = $request->validate([
            'lista_nome' => 'required|string|max:255',
        ]);

        Lead::where('hash_lista', $hash_lista)->update(['lista_nome' => $validatedData['lista_nome']]);

        $leadsToKeep = $request->input('leads', []);

        Lead::where('hash_lista', $hash_lista)->whereNotIn('id', $leadsToKeep)->delete();

        return redirect()->route('leads.index')->with('success', 'Lista de leads atualizada com sucesso!');
    }


    public function destroy($hash_lista)
    {
        $lead = Lead::where('hash_lista', $hash_lista)->firstOrFail();
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lista de leads deletada com sucesso!');
    }
}
