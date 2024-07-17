@extends('layout.app', ['current' => 'categorias'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <form method="POST" action="/produtos" class="form">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome do produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="qtdEstoque">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="qtdEstoque" id="qtdEstoque"
                        placeholder="Quantidade em estoque">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="preco" id="preco" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoria" aria-label="Default select example">
                        <option selected>Selecione a categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="/produtos" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
