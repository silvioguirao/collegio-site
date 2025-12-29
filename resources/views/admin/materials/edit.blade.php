@extends('admin.layout')

@section('content')
    <h1>Editar Material</h1>
    <form action="{{ route('admin.materials.update', $material) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $material->titulo) }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ old('descricao', $material->descricao) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label><br>
            @if($material->arquivo)
                <a href="{{ asset('storage/' . $material->arquivo) }}" target="_blank">Arquivo atual</a><br>
            @endif
            <input type="file" name="arquivo" id="arquivo" class="form-control mt-2">
            <small class="form-text text-muted">Deixe em branco para manter o arquivo atual.</small>
        </div>
        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select name="turma_id" id="turma_id" class="form-control">
                <option value="">Todas as turmas</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" @if($material->turma_id == $turma->id) selected @endif>{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="publicado" @if($material->status==='publicado') selected @endif>Publicado</option>
                <option value="rascunho" @if($material->status==='rascunho') selected @endif>Rascunho</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
