@extends('admin.layout')

@section('content')
    <h1>Novo Boletim</h1>
    <form action="{{ route('admin.boletins.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-control" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome ?? $aluno->name }} ({{ $aluno->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="periodo" class="form-label">Período</label>
            <input type="text" name="periodo" id="periodo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="notas" class="form-label">Notas (JSON)</label>
            <textarea name="notas" id="notas" class="form-control" rows="6">{}</textarea>
            <small class="form-text text-muted">Insira um JSON válido com as notas (ex.: {"matematica":8.5}).</small>
        </div>
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.boletins.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
