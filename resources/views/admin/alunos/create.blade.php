@extends('admin.layout')

@section('content')
    <h1>Novo Aluno</h1>
    <form action="{{ route('admin.alunos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select name="turma_id" id="turma_id" class="form-control">
                <option value="">Nenhuma</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.alunos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
