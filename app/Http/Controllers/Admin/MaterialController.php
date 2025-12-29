<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaterialDidatico;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', MaterialDidatico::class);
        $materials = MaterialDidatico::with('turma')->orderByDesc('created_at')->paginate(20);
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $this->authorize('create', MaterialDidatico::class);
        $turmas = Turma::all();
        return view('admin.materials.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', MaterialDidatico::class);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'required|file|mimes:pdf,zip,doc,docx,mp4|max:10240',
            'turma_id' => 'nullable|exists:turmas,id',
            'status' => 'required|in:publicado,rascunho',
        ]);
        $path = $request->file('arquivo')->store('uploads/materials', 'public');
        $data['arquivo'] = $path;
        MaterialDidatico::create($data);
        return redirect()->route('admin.materials.index')->with('success', 'Material salvo com sucesso!');
    }

    public function edit(MaterialDidatico $material)
    {
        $this->authorize('update', $material);
        $turmas = Turma::all();
        return view('admin.materials.edit', compact('material', 'turmas'));
    }

    public function update(Request $request, MaterialDidatico $material)
    {
        $this->authorize('update', $material);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'nullable|file|mimes:pdf,zip,doc,docx,mp4|max:10240',
            'turma_id' => 'nullable|exists:turmas,id',
            'status' => 'required|in:publicado,rascunho',
        ]);
        if ($request->hasFile('arquivo')) {
            if ($material->arquivo) {
                Storage::disk('public')->delete($material->arquivo);
            }
            $data['arquivo'] = $request->file('arquivo')->store('uploads/materials', 'public');
        }
        $material->update($data);
        return redirect()->route('admin.materials.index')->with('success', 'Material atualizado com sucesso!');
    }

    public function destroy(MaterialDidatico $material)
    {
        $this->authorize('delete', $material);
        if ($material->arquivo) {
            Storage::disk('public')->delete($material->arquivo);
        }
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material removido com sucesso!');
    }
}
