@extends('admin.layout')

@section('content')
    <h1>Editar Imagem</h1>
    <form action="{{ route('admin.images.update', $image) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label><br>
            @if($image->arquivo)
                <img src="{{ asset('storage/' . $image->arquivo) }}" alt="{{ $image->descricao }}" width="120"><br>
            @endif
            <input type="file" name="arquivo" id="arquivo" class="form-control mt-2">
            <small class="form-text text-muted">Deixe em branco para manter o arquivo atual.</small>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao', $image->descricao) }}">
        </div>
        <div class="mb-3">
            <label for="pagina_id" class="form-label">Página Institucional</label>
            <select name="pagina_id" id="pagina_id" class="form-control" required>
                @foreach($paginas as $pagina)
                    <option value="{{ $pagina->id }}" @if($image->pagina_id == $pagina->id) selected @endif>{{ $pagina->titulo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
