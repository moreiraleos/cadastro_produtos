<?php

use App\Models\Categoria;

function mostraCategoria($id)
{
    $categoria = Categoria::find($id);
    return $categoria->name;
}