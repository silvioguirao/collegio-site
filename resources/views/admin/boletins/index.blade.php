@extends('admin.layout')

@section('content')
    <h1>Boletins</h1>
    <a href="{{ route('admin.boletins.create') }}" class="btn btn-primary">Novo Boletim</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Período</th>
                <th>Notas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boletins as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->aluno ? $b->aluno->nome ?? $b->aluno->name : '-' }}</td>
                    <td>{{ $b->periodo }}</td>
                    <td><pre>{{ json_encode($b->notas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></td>
                    <td>
                        <a href="{{ route('admin.boletins.edit', $b) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.boletins.destroy', $b) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $boletins->links() }}
@endsection
