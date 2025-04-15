<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TbWasher;
use App\Models\TbDryingMachine;
use App\Models\TbOrders;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    public function create()
    {
        return view('empleado.registrar_pedido', [
            'products' => Product::all(),
            'washers'  => TbWasher::all(),
            'dryers'   => TbDryingMachine::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'service_type'  => 'required|in:drop_off,auto_lavado',
            'date'          => 'required|date',
            'status'        => 'required|in:completed,canceled',
        ]);

        if ($request->service_type === 'drop_off') {
            $request->validate([
                'quantity_kg' => 'required|numeric|min:1',
            ]);
        }

        $total = floatval($request->input('total'));

        TbOrders::create([
            'customer_name' => $request->customer_name,
            'service_type'  => $request->service_type,
            'quantity_kg'   => $request->service_type === 'drop_off' ? $request->quantity_kg : null,
            'date'          => $request->date,
            'total'         => $total,
            'status'        => $request->status,
        ]);

        return redirect()->route('empleado.pedidos.menu')->with('success', 'Pedido registrado correctamente.');
    }

    public function vistaLavadoEntrega()
    {
        return view('empleado.lavado_con_entrega');
    }

    public function vistaAutolavado()
    {
        return view('empleado.autolavado', [
            'products' => Product::all(),
            'washers' => TbWasher::all(),
            'dryers' => TbDryingMachine::all()
        ]);
    }

    public function index()
    {
        $pedidos = TbOrders::all();
        return view('empleado.ver_pedidos', compact('pedidos')); // ← Vista corregida
    }

    public function generarPDF()
    {
        $pedidos = TbOrders::all();
        $pdf = Pdf::loadView('empleado.reporte_pedidos_pdf', compact('pedidos'));
        return $pdf->download('reporte_pedidos.pdf');
    }

    public function edit($id)
    {
        $pedido = TbOrders::findOrFail($id);
        return view('empleado.editar_pedido', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'date' => 'required|date',
            'status' => 'required|in:completed,canceled',
        ]);

        $pedido = TbOrders::findOrFail($id);
        $pedido->customer_name = $request->customer_name;
        $pedido->date = $request->date;
        $pedido->status = $request->status;
        $pedido->save();

        return redirect()->route('empleado.pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    // Puedes eliminar esta función si usas 'index' para ver pedidos
    public function verPedidosDueno()
    {
        $pedidos = TbOrders::all();
        return view('dueno.ver_pedidos', compact('pedidos'));
    }
    

    public function listaPedidos()
{
    $pedidos = TbOrders::all();
    return view('empleado.lista_pedidos', compact('pedidos'));
}

}
