@extends('layout.app', ['current' => 'home'])
@section('body')
    <div class="container mt-5">
        <div class="jumbotron bg-light border boder-secondary">
            <div class="row">
                <div class="card-deck">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de produtos</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nam maxime minima nihil sit doloremque veniam praesentium necessitatibus veritatis.
                            </p>
                            <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                        </div>
                    </div>
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de categorias</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nam maxime minima nihil sit doloremque veniam praesentium necessitatibus veritatis.
                            </p>
                            <a href="/categorias" class="btn btn-primary">Cadastre seus produtos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
