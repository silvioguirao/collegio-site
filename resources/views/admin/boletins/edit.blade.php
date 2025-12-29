@extends('admin.layout')

@section('content')
    <h1>Editar Boletim</h1>
    <form action="{{ route('admin.boletins.update', $boletim) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-control" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" @if($boletim->aluno_id == $aluno->id) selected @endif>{{ $aluno->nome ?? $aluno->name }} ({{ $aluno->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="periodo" class="form-label">Período</label>
            <input type="text" name="periodo" id="periodo" class="form-control" value="{{ old('periodo', $boletim->periodo) }}" required>
        </div>
        <div class="mb-3">
            <label for="notas" class="form-label">Notas (JSON)</label>
            <textarea name="notas" id="notas" class="form-control" rows="6">{{ json_encode(old('notas', $boletim->notas), JSON_UNESCAPED_UNICODE) }}</textarea>
            <small class="form-text text-muted">Insira um JSON válido com as notas (ex.: {"matematica":8.5}).</small>
        </div>
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control" rows="3">{{ old('observacoes', $boletim->observacoes) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.boletins.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
