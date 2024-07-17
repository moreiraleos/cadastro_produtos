@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de produtos</h5>
            @if (isset($produtos) && count($produtos))
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da produto</th>
                            <th>Qtd em estoque</th>
                            <th>Preco</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->name }}</td>
                                <td>{{ $produto->estoque }}</td>
                                <td>R${{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td>{{ mostraCategoria($produto->categoria_id) }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/produtos/editar/{{ $produto->id }}">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="/produtos/apagar/{{ $produto->id }}">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo produto</a>
        </div>
    </div>
@endsection
