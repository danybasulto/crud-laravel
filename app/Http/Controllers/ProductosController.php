<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $productos = Producto::with('categoria')->get();
        return view('Producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorias = Categoria::all();
        return view('Producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255|min:3',
            'precio' => 'required|numeric',
            'id_categoria' => 'required|exists:categorias,id'
        ],[
            'nombre.required' => 'El nombre del producto es obligatorio',
            'nombre.max' => 'El nombre del producto no puede superar los 255 caracteres',
            'nombre.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'precio.required' => 'El precio del producto es obligatorio',
            'precio.numeric' => 'El precio del producto debe ser un número',
            'id_categoria.required' => 'La categoría del producto es obligatoria',
            'id_categoria.exists' => 'La categoría del producto no existe'
        ]);

        Producto::create(array_merge($request->all(), ['activo' => 1]));

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
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
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('Producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:255|min:3',
            'precio' => 'required|numeric',
            'id_categoria' => 'required|exists:categorias,id'
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio',
            'nombre.max' => 'El nombre del producto no puede superar los 255 caracteres',
            'nombre.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'precio.required' => 'El precio del producto es obligatorio',
            'precio.numeric' => 'El precio del producto debe ser un número',
            'id_categoria.required' => 'La categoría del producto es obligatoria',
            'id_categoria.exists' => 'La categoría del producto no existe'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
