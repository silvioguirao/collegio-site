@extends('admin.layout')

@section('content')
    <h1>Nova Imagem</h1>
    <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pagina_id" class="form-label">Página Institucional</label>
            <select name="pagina_id" id="pagina_id" class="form-control" required>
                <option value="">Selecione...</option>
                @foreach($paginas as $pagina)
                    <option value="{{ $pagina->id }}">{{ $pagina->titulo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
