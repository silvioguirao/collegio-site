@extends('admin.layout')

@section('content')
    <h1>Páginas Institucionais</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Nova Página</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Slug</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->titulo }}</td>
                    <td>{{ $page->status }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->autor_id }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pages->links() }}
@endsection
