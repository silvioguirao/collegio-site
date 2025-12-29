<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $alunos = User::where('perfil', 'aluno')->orderByDesc('created_at')->paginate(20);
        return view('admin.alunos.index', compact('alunos'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $turmas = Turma::all();
        return view('admin.alunos.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'turma_id' => 'nullable|exists:turmas,id',
        ]);
        $data['perfil'] = 'aluno';
        $data['status'] = 'ativo';
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function edit(User $aluno)
    {
        $this->authorize('update', $aluno);
        $turmas = Turma::all();
        return view('admin.alunos.edit', compact('aluno', 'turmas'));
    }

    public function update(Request $request, User $aluno)
    {
        $this->authorize('update', $aluno);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $aluno->id,
            'password' => 'nullable|string|min:6',
            'turma_id' => 'nullable|exists:turmas,id',
        ]);
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $aluno->update($data);
        return redirect()->route('admin.alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(User $aluno)
    {
        $this->authorize('delete', $aluno);
        $aluno->delete();
        return redirect()->route('admin.alunos.index')->with('success', 'Aluno removido com sucesso!');
    }
}
