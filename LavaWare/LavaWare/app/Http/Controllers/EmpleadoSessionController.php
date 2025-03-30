<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeSession;
use Carbon\Carbon;

class EmpleadoSessionController extends Controller
{
    public function index(Request $request)
{
    $query = EmployeeSession::with('user')->orderBy('login_time', 'desc');

    if ($request->filled('nombre')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->nombre . '%');
        });
    }

    if ($request->filled('fecha')) {
        $fecha = \Carbon\Carbon::createFromFormat('d/m/Y', $request->fecha)->startOfDay();
        $query->whereDate('login_time', $fecha);
    }

    $sesiones = $query->get();

    return view('dueno.sesiones', compact('sesiones'));
}

}
