@extends('layout.app', ['current' => 'categorias'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <form method="POST" action="/categorias/{{ $categoria->id }}" class="form">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria"
                        value="{{ $categoria->name }}" placeholder="Categoria">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="/categorias" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
