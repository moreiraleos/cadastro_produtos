<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navBar">

        <ul class="navbar-nav mr-auto">

            <li @if ($current == 'home') class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li @if ($current == 'produtos') class="nav-item active" @else class="nav-item" @endif
                class="nav-item">
                <a class="nav-link" href="/produtos">Produtos <span class="sr-only">(current)</span></a>
            </li>

            <li @if ($current == 'categorias') class="nav-item active" @else class="nav-item" @endif
                class="nav-item">
                <a class="nav-link" href="/categorias">Categorias <span class="sr-only">(current)</span></a>
            </li>

        </ul>

    </div>
</nav>
