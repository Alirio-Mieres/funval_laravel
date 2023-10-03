<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productos = new Product();
        return $productos->all(); 
    }

    public function create(Request $request)
    {
        $producto = new Product();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        return $producto;
    }

    public function show($id)
    {
        $producto = new Product();
        return $producto->find($id);
    }

    public function update($id, Request $request)
    {
        $producto = Product::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        return $producto;
    }

    public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();
        return $producto;
    }
}
