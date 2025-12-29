@extends('admin.layout')

@section('content')
    <h1>Alunos</h1>
    <a href="{{ route('admin.alunos.create') }}" class="btn btn-primary">Novo Aluno</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Turma</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome ?? $aluno->name }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->turma_id ?? '-' }}</td>
                    <td>{{ $aluno->status }}</td>
                    <td>
                        <a href="{{ route('admin.alunos.edit', $aluno) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.alunos.destroy', $aluno) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $alunos->links() }}
@endsection
