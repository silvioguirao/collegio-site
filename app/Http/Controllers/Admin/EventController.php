<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Event::class);
        $events = Event::with('imagem', 'autor')->orderByDesc('data_evento')->paginate(20);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $this->authorize('create', Event::class);
        $images = Image::all();
        return view('admin.events.create', compact('images'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Event::class);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_evento' => 'nullable|date',
            'imagem_id' => 'nullable|exists:images,id',
            'status' => 'required|in:publicado,rascunho',
            'slug' => 'nullable|string|unique:events,slug',
        ]);
        $data['autor_id'] = Auth::id();
        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        $images = Image::all();
        return view('admin.events.edit', compact('event', 'images'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_evento' => 'nullable|date',
            'imagem_id' => 'nullable|exists:images,id',
            'status' => 'required|in:publicado,rascunho',
            'slug' => 'nullable|string|unique:events,slug,' . $event->id,
        ]);
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Evento removido com sucesso!');
    }
}
