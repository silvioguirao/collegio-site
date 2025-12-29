@extends('admin.layout')

@section('content')
    <h1>Novo Material Didático</h1>
    <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select name="turma_id" id="turma_id" class="form-control">
                <option value="">Todas as turmas</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
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
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
