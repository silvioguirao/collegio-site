<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Turma::class);
        $turmas = Turma::orderByDesc('created_at')->paginate(20);
        return view('admin.turmas.index', compact('turmas'));
    }

    public function create()
    {
        $this->authorize('create', Turma::class);
        return view('admin.turmas.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Turma::class);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'ano_letivo' => 'nullable|string|max:255',
        ]);
        Turma::create($data);
        return redirect()->route('admin.turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    public function edit(Turma $turma)
    {
        $this->authorize('update', $turma);
        return view('admin.turmas.edit', compact('turma'));
    }

    public function update(Request $request, Turma $turma)
    {
        $this->authorize('update', $turma);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'ano_letivo' => 'nullable|string|max:255',
        ]);
        $turma->update($data);
        return redirect()->route('admin.turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        $this->authorize('delete', $turma);
        $turma->delete();
        return redirect()->route('admin.turmas.index')->with('success', 'Turma removida com sucesso!');
    }
}
