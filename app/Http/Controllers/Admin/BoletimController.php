<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boletim;
use App\Models\User;
use Illuminate\Http\Request;

class BoletimController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Boletim::class);
        $boletins = Boletim::with('aluno')->orderByDesc('created_at')->paginate(20);
        return view('admin.boletins.index', compact('boletins'));
    }

    public function create()
    {
        $this->authorize('create', Boletim::class);
        $alunos = User::where('perfil', 'aluno')->get();
        return view('admin.boletins.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Boletim::class);
        $data = $request->validate([
            'aluno_id' => 'required|exists:users,id',
            'periodo' => 'required|string|max:255',
            'notas' => 'nullable|array',
            'observacoes' => 'nullable|string',
        ]);
        // store notas as JSON
        $data['notas'] = $data['notas'] ?? null;
        Boletim::create($data);
        return redirect()->route('admin.boletins.index')->with('success', 'Boletim criado com sucesso!');
    }

    public function edit(Boletim $boletim)
    {
        $this->authorize('update', $boletim);
        $alunos = User::where('perfil', 'aluno')->get();
        return view('admin.boletins.edit', compact('boletim', 'alunos'));
    }

    public function update(Request $request, Boletim $boletim)
    {
        $this->authorize('update', $boletim);
        $data = $request->validate([
            'aluno_id' => 'required|exists:users,id',
            'periodo' => 'required|string|max:255',
            'notas' => 'nullable|array',
            'observacoes' => 'nullable|string',
        ]);
        $boletim->update($data);
        return redirect()->route('admin.boletins.index')->with('success', 'Boletim atualizado com sucesso!');
    }

    public function destroy(Boletim $boletim)
    {
        $this->authorize('delete', $boletim);
        $boletim->delete();
        return redirect()->route('admin.boletins.index')->with('success', 'Boletim excluído com sucesso!');
    }
}
