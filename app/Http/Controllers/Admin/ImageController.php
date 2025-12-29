<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with('pagina')->orderByDesc('created_at')->paginate(20);
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        $paginas = Page::all();
        return view('admin.images.create', compact('paginas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'arquivo' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
            'descricao' => 'nullable|string|max:255',
            'pagina_id' => 'required|exists:pages,id',
        ]);
        $path = $request->file('arquivo')->store('uploads/imagens', 'public');
        $data['arquivo'] = $path;
        Image::create($data);
        return redirect()->route('admin.images.index')->with('success', 'Imagem cadastrada com sucesso!');
    }

    public function edit(Image $image)
    {
        $paginas = Page::all();
        return view('admin.images.edit', compact('image', 'paginas'));
    }

    public function update(Request $request, Image $image)
    {
        $data = $request->validate([
            'arquivo' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
            'descricao' => 'nullable|string|max:255',
            'pagina_id' => 'required|exists:pages,id',
        ]);
        if ($request->hasFile('arquivo')) {
            if ($image->arquivo) {
                Storage::disk('public')->delete($image->arquivo);
            }
            $data['arquivo'] = $request->file('arquivo')->store('uploads/imagens', 'public');
        }
        $image->update($data);
        return redirect()->route('admin.images.index')->with('success', 'Imagem atualizada com sucesso!');
    }

    public function destroy(Image $image)
    {
        if ($image->arquivo) {
            Storage::disk('public')->delete($image->arquivo);
        }
        $image->delete();
        return redirect()->route('admin.images.index')->with('success', 'Imagem removida com sucesso!');
    }
}
