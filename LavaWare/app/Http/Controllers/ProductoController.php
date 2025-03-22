<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductoController extends Controller
{
    /**
     * Guardar un nuevo producto (Alta de producto - HU12)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Product::create($validated);

        return redirect()->route('dueno.productos.create')->with('success', 'Producto registrado correctamente.');
    }

    /**
     * Mostrar productos para eliminarlos (Baja de producto - HU13)
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $productos = $query->get(); // Puedes usar ->paginate(10) si prefieres

        return view('dueno.baja_productos', compact('productos'));
    }

    /**
     * Eliminar un producto por su ID (Baja de producto - HU13)
     */
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return redirect()->route('dueno.productos.baja')->with('success', 'Producto eliminado correctamente.');
    }
}
