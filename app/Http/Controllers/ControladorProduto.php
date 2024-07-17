<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view("produtos", compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('novoProduto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->name = $request->nomeProduto;
        $produto->estoque = $request->qtdEstoque;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria;
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);

        if (isset($produto)) {
            return view('editarProduto', compact('produto', 'categorias'));
        }
        return redirect("/produtos");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);
        $produto->name = $request->nomeProduto;
        $produto->estoque = $request->qtdEstoque;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria;
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Produto::find($id)) {
            Produto::destroy($id);
        }
        return redirect("/produtos");
    }
}
