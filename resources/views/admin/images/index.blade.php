@extends('admin.layout')

@section('content')
    <h1>Imagens</h1>
    <a href="{{ route('admin.images.create') }}" class="btn btn-primary">Nova Imagem</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Arquivo</th>
                <th>Descrição</th>
                <th>Página</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        @if($image->arquivo)
                            <img src="{{ asset('storage/' . $image->arquivo) }}" alt="{{ $image->descricao }}" width="80">
                        @endif
                    </td>
                    <td>{{ $image->descricao }}</td>
                    <td>{{ $image->pagina ? $image->pagina->titulo : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.images.edit', $image) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.images.destroy', $image) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $images->links() }}
@endsection
