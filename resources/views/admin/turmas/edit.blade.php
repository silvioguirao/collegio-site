@extends('admin.layout')

@section('content')
    <h1>Editar Turma</h1>
    <form action="{{ route('admin.turmas.update', $turma) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $turma->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="ano_letivo" class="form-label">Ano Letivo</label>
            <input type="text" name="ano_letivo" id="ano_letivo" class="form-control" value="{{ old('ano_letivo', $turma->ano_letivo) }}">
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
