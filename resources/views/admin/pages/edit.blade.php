@extends('admin.layout')

@section('content')
    <h1>Editar Página Institucional</h1>
    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $page->titulo) }}" required>
        </div>
        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" class="form-control" rows="8" required>{{ old('conteudo', $page->conteudo) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $page->slug) }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="publicado" @if(old('status', $page->status)==='publicado') selected @endif>Publicado</option>
                <option value="rascunho" @if(old('status', $page->status)==='rascunho') selected @endif>Rascunho</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
