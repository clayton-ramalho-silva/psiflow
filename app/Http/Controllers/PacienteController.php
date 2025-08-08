<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::where('user_id', auth()->id())->paginate(50); // Fetch pacientes for the authenticated user
        
        return view('pacientes.index', compact('pacientes')); // Return the index view with
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create'); // Return a view for creating a new Paciente
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'nullable|string|max:50',
            'cpf' => 'required|string|unique:pacientes,cpf|max:14',
            'rg' => 'nullable|string|max:20',
            'telefone_celular' => 'nullable|string|max:15',
            'telefone_fixo' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'cep' => 'nullable|string|max:10',
            'historico_medico' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);
        
        //dd($validatedData); // Debugging line to check the validated data
        $validatedData['user_id'] = auth()->id(); // Set the user_id to the authenticated user
        
        // Purify the input to prevent XSS attacks
        $purifiedData = [
            'historico_medico' => Purifier::clean($validatedData['historico_medico'] ?? ''),
            'observacoes' => Purifier::clean($validatedData['observacoes'] ?? ''),
        ];  

        // 3. Mescla os dados validados + purificados
        $dataToSave = array_merge($validatedData, $purifiedData);

        //dd($dataToSave); // Debugging line to check the final data to be saved
        // 4. Persistência no banco
        $paciente = Paciente::create($dataToSave);

        return redirect()->route('pacientes.index')->with('success', 'Paciente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente')); // Return a view for editing the specified Paciente
        // Note: Ensure that the 'paciente' variable is passed to the view
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'nullable|string|max:50',
            'cpf' => 'required|string|unique:pacientes,cpf,' . $paciente->id . '|max:14',
            'rg' => 'nullable|string|max:20',
            'telefone_celular' => 'nullable|string|max:15',
            'telefone_fixo' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'cep' => 'nullable|string|max:10',
            'historico_medico' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        // Purify the input to prevent XSS attacks
        $purifiedData = [
            'historico_medico' => Purifier::clean($validatedData['historico_medico'] ?? ''),
            'observacoes' => Purifier::clean($validatedData['observacoes'] ?? ''),
        ];  

        // 3. Mescla os dados validados + purificados
        $dataToUpdate = array_merge($validatedData, $purifiedData);

        $paciente->update($dataToUpdate);

        return redirect()->back()->with('success', 'Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente deletado com sucesso!');
    }
}
