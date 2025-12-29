@extends('admin.layout')

@section('content')
    <h1>Novo Evento</h1>
    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="data_evento" class="form-label">Data do Evento</label>
            <input type="datetime-local" name="data_evento" id="data_evento" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagem_id" class="form-label">Imagem Destacada</label>
            <select name="imagem_id" id="imagem_id" class="form-control">
                <option value="">Nenhuma</option>
                @foreach($images as $img)
                    <option value="{{ $img->id }}">{{ $img->descricao ?? $img->arquivo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="publicado">Publicado</option>
                <option value="rascunho">Rascunho</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
