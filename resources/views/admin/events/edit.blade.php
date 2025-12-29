@extends('admin.layout')

@section('content')
    <h1>Editar Evento</h1>
    <form action="{{ route('admin.events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $event->titulo) }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="5">{{ old('descricao', $event->descricao) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="data_evento" class="form-label">Data do Evento</label>
            <input type="datetime-local" name="data_evento" id="data_evento" class="form-control" value="{{ old('data_evento', $event->data_evento ? $event->data_evento->format('Y-m-d\TH:i') : '') }}">
        </div>
        <div class="mb-3">
            <label for="imagem_id" class="form-label">Imagem Destacada</label>
            <select name="imagem_id" id="imagem_id" class="form-control">
                <option value="">Nenhuma</option>
                @foreach($images as $img)
                    <option value="{{ $img->id }}" @if($event->imagem_id == $img->id) selected @endif>{{ $img->descricao ?? $img->arquivo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="publicado" @if($event->status==='publicado') selected @endif>Publicado</option>
                <option value="rascunho" @if($event->status==='rascunho') selected @endif>Rascunho</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $event->slug) }}">
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
