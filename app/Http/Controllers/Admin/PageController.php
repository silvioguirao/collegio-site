<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Page::class);
        $pages = Page::orderByDesc('created_at')->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $this->authorize('create', Page::class);
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Page::class);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'status' => 'required|in:publicado,rascunho',
        ]);
        $data['autor_id'] = Auth::id();
        $page = Page::create($data);
        return redirect()->route('admin.pages.index')->with('success', 'Página criada com sucesso!');
    }

    public function edit(Page $page)
    {
        $this->authorize('update', $page);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $this->authorize('update', $page);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'status' => 'required|in:publicado,rascunho',
        ]);
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('success', 'Página atualizada com sucesso!');
    }

    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Página removida com sucesso!');
    }
}
