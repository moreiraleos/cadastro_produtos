@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de produtos</h5>
            @if (isset($produtos) && count($produtos))
                <table class="table table-ordered table-hover" id="tabelaProdutos">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do produto</th>
                            <th>Qtd em estoque</th>
                            <th>Preco</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($produtos as $produto)
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
                        @endforeach --}}

                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" data-toggle="modal" onClick="novoProduto()" role="button">Novo
                produto</button>
        </div>
    </div>

    {{-- Modal novo produto --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="dlgProdutos" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Novo produto</h5>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="name">Nome do produto</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                name="name" id="name" placeholder="Produto">
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
                            <select class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}"
                                name="categoria" id="categoria" aria-label="Default select example">
                                <option selected>Selecione a categoria</option>
                                {{-- @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                @endforeach --}}
                            </select>
                            @if ($errors->has('categoria'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('categoria') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function criarProduto() {
            prod = {
                name: $('#name').val(),
                preco: $('#qtdEstoque').val(),
                estoque: $('#preco').val(),
                categoria_id: $('#categoria').val()
            }

            $.post("/api/produtos", prod, function(data, response) {
                if (response == 'success') {
                    alert("Produto gravado com sucesso!");
                }
            });
        }

        $('#formProduto').submit(function(event) {
            event.preventDefault();
            console.log('teste');
            criarProduto();
            $('#dlgProdutos').modal('hide');
        });

        function novoProduto() {
            $('#id').val('');
            $('#name').val('');
            $('#qtdEstoque').val('');
            $('#preco').val('');
            $('#dlgProdutos').modal('show');
        }

        function carregarCategorias() {
            $.getJSON("/api/categorias", function(data) {
                //console.log(data)
                data.forEach(e => {
                    opcao = '<option value="' + e.id + '">' + e.name + '</option>';
                    $('#categoria').append(opcao);
                });

            });
        }


        function carregarProdutos() {
            $.getJSON("/api/produtos", function(produtos) {

                for (i = 0; i < produtos.length; i++) {
                    //console.log(produtos[i]);
                    linha = montarLinha(produtos[i]);
                    $('#tabelaProdutos>tbody').append(linha);
                }

            });
        }

        function montarLinha(p) {
            var categorias = @json(collect($categorias)->pluck('name', 'id')->toArray());
            //console.log(categorias);
            var linha = `
            <tr>
                <td>${p.id}</td>
                <td>${p.name}</td>
                <td>${p.estoque}</td>
                <td>${p.preco}</td>
                <td>${mostrarCategoria(p.categoria_id, categorias)}</td>
                <td>
                    <button class='btn btn-primary btn-xs'>Editar</button>
                    <button class='btn btn-xs btn-danger'>Apagar</button>
                </td>
            </tr>`;
            return linha;
        }


        function mostrarCategoria(categoriaId, categorias) {
            return categorias[categoriaId] || 'Categoria Desconhecida';
        }


        $(function() {
            carregarCategorias();
            carregarProdutos();
        })
    </script>
@endsection
