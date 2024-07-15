<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view("categorias", compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("novaCategoria");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cat = new Categoria();
        $cat->name = $request->get('nomeCategoria');
        $cat->save();
        // return Redirect::to("/categorias");
        return redirect("/categorias");

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
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            return view('editarCategoria', compact('categoria'));
        }
        return redirect("/categorias");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            $categoria->name = $request->get('nomeCategoria');
            $categoria->save();
        }
        return redirect("/categorias");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Categoria::find($id)) {
            Categoria::destroy($id);
        }
        return redirect("/categorias");
    }
}
