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
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Crear un nuevo producto en la base de datos
        Product::create($validated);

        return redirect()->route('dueno.productos.create')
            ->with('success', 'Producto registrado correctamente.');
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

        $productos = $query->get();

        return view('dueno.baja_productos', compact('productos'));
    }

    /**
     * Eliminar un producto por su ID (Baja de producto - HU13)
     */
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return redirect()->route('dueno.productos.baja')
            ->with('success', 'Producto eliminado correctamente.');
    }

    /**
     * Mostrar vista del inventario con filtros (Control de Inventario - HU07)
     */
    public function inventario(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                  ->orWhere('name', 'like', "%$search%")
                  ->orWhere('brand', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$search%");
            });
        }

        $productos = $query->get();

        return view('dueno.inventario', compact('productos'));
    }
}
