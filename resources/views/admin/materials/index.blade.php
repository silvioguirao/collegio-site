@extends('admin.layout')

@section('content')
    <h1>Materiais Didáticos</h1>
    <a href="{{ route('admin.materials.create') }}" class="btn btn-primary">Novo Material</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Turma</th>
                <th>Status</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->titulo }}</td>
                    <td>{{ $m->turma ? $m->turma->nome : '-' }}</td>
                    <td>{{ $m->status }}</td>
                    <td><a href="{{ asset('storage/' . $m->arquivo) }}" target="_blank">Abrir</a></td>
                    <td>
                        <a href="{{ route('admin.materials.edit', $m) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.materials.destroy', $m) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $materials->links() }}
@endsection
