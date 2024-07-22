@extends('layout.app', ['current' => 'produtos'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <form method="POST" action="/produtos" class="form">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome do produto</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                        id="name" placeholder="Produto">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="qtdEstoque">Quantidade em estoque</label>
                    <input type="number" class="form-control {{ $errors->has('qtdEstoque') ? 'is-invalid' : '' }}"
                        name="qtdEstoque" id="qtdEstoque" placeholder="Quantidade em estoque">
                    @if ($errors->has('qtdEstoque'))
                        <div class="invalid-feedback">
                            {{ $errors->first('qtdEstoque') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control  {{ $errors->has('qtdEstoque') ? 'is-invalid' : '' }}"
                        name="preco" id="preco" placeholder="Preço">
                    @if ($errors->has('preco'))
                        <div class="invalid-feedback">
                            {{ $errors->first('preco') }}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" name="categoria"
                        aria-label="Default select example">
                        <option selected>Selecione a categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('categoria'))
                        <div class="invalid-feedback">
                            {{ $errors->first('categoria') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="/produtos" class="btn btn-danger btn-sm">Cancelar</a>
            </form>
        </div>

    </div>
@endsection
