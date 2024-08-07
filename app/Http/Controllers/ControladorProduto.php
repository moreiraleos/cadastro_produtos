<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ControladorProduto extends Controller
{
    public function indexView()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();

        return view("produtos", compact('produtos', 'categorias'));
    }
    public function index()
    {
        $produtos = Produto::all();
        return $produtos->toJson();
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
        // $request->validate([
        //     "name" => "required|unique:produtos",
        //     "qtdEstoque" => "required|integer",
        //     "preco" => "required|numeric|min:1|max:5",
        //     'categoria' => 'required|integer'
        // ]);

        // $rules = [
        //     "name" => "required|min:3|unique:produtos",
        //     "qtdEstoque" => "required|integer",
        //     "preco" => "required|numeric|min:1|max:5"
        // ];

        // $mensagens = [
        //     "name.required" => 'O nome é requirido',
        //     "name.min" => "É necessário no mínimo 3 caracteres no nome "
        // ];

        // $request->validate($rules, $mensagens);

        // $produto = new Produto();
        // $produto->name = $request->name;
        // $produto->estoque = $request->qtdEstoque;
        // $produto->preco = $request->preco;
        // $produto->categoria_id = $request->categoria;
        // $produto->save();
        // return redirect('/produtos');

        $prod = new Produto();
        $prod->name = $request->input('name');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id');

        $prod->save();
        return json_encode($prod);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($prod = Produto::find($id)) {
            return json_encode($prod);
        }
        return json_encode(["message" => "Não encontrado", "status" => "404"]);
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
        if (isset($produto)) {
            $produto->name = $request->name;
            $produto->estoque = $request->estoque;
            $produto->preco = $request->preco;
            $produto->categoria_id = $request->categoria_id;
            $produto->save();
            return json_encode([
                "response" => $produto,
                "message" => "success",
                "status" => "200"
            ]);
        }
        return json_encode([
            "message" => "Produto não encontrado",
            "status" => "404"
        ]);
        // $produto->name = $request->nomeProduto;
        // $produto->estoque = $request->qtdEstoque;
        // $produto->preco = $request->preco;
        // $produto->categoria_id = $request->categoria;
        // $produto->save();
        // return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Produto::find($id)) {
            Produto::destroy($id);
            return json_encode([
                "msg" => "success",
                "response" => "200"
            ]);
        }
        return json_encode([
            "msg" => "error",
            "response" => "404"
        ]);
        // return redirect("/produtos");
    }
}
