@extends('admin.layout')

@section('content')
    <h1>Eventos</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Novo Evento</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Status</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->titulo }}</td>
                    <td>{{ $event->data_evento ? $event->data_evento->format('d/m/Y H:i') : '-' }}</td>
                    <td>{{ $event->status }}</td>
                    <td>
                        @if($event->imagem)
                            <img src="{{ asset('storage/' . $event->imagem->arquivo) }}" width="80" alt="">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
@endsection
