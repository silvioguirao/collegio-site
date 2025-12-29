@extends('admin.layout')

@section('content')
    <h1>Turmas</h1>
    <a href="{{ route('admin.turmas.create') }}" class="btn btn-primary">Nova Turma</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano Letivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <td>{{ $turma->id }}</td>
                    <td>{{ $turma->nome }}</td>
                    <td>{{ $turma->ano_letivo }}</td>
                    <td>
                        <a href="{{ route('admin.turmas.edit', $turma) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.turmas.destroy', $turma) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $turmas->links() }}
@endsection
