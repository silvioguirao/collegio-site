@extends('admin.layout')

@section('content')
    <h1>Nova Turma</h1>
    <form action="{{ route('admin.turmas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ano_letivo" class="form-label">Ano Letivo</label>
            <input type="text" name="ano_letivo" id="ano_letivo" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
