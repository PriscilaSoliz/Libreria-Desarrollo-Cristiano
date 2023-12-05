<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\cliente;
use Barryvdh\DomPDF\Facade\Pdf;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compra = Compra::get();
        $provedor = Provedor::all();
        return view('VistaCompra.index', compact('compra', 'provedor'));
    }

    public function reporte(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Verificar si se proporcionaron ambas fechas
        if ($start_date && $end_date) {
            // Incrementar la fecha final por un día
            $end_date_modified = date('Y-m-d', strtotime($end_date . ' +1 day'));

            // Filtrar las ventas según el rango de fechas proporcionado, incluyendo el día siguiente al end_date
            $compra = Compra::whereBetween('created_at', [$start_date, $end_date_modified])->get();
        } else {
            // Si falta alguna fecha, podrías manejarlo como desees
            // Por ejemplo, podrías mostrar un mensaje de error o cargar todas las ventas
            $compras = Compra::all(); // Esto cargaría todas las ventas si falta alguna fecha
        }

        return view('VistaCompra.reporte', [
            'compra' => $compras,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $compra = Compra::all();
        return view('VistaCompra.Create', compact('compra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {

        $compra = new Compra();
        $compra->provedor_id = $r->input('ci');
       // dd($compra);
        $compra->formapago = $r->input('formapago');
        // dd($venta->cliente_id);
        // Obtener el ID del usuario autenticado y asignarlo al campo usuario_id de la venta
     //   dd($compra->proveedor_id);
        $usuario_id = Auth::id();
        $compra->usuario_id = $usuario_id;
        $compra->save();
        // Obtener el ID de la venta recién creada
        $compra_id = $compra->id;

        return redirect()->route('detallecompra.index', ['compra_id' => $compra_id])->with('success', 'Nota de Compra Registrada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    public function pdf(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            // Incrementar la fecha final por un día
            $end_date_modified = date('Y-m-d', strtotime($end_date . ' +1 day'));

            // Filtrar las ventas según el rango de fechas proporcionado, incluyendo el día siguiente al end_date
            $compras = Compra::whereBetween('created_at', [$start_date, $end_date_modified])->get();
        } else {
            // Si no se proporciona un rango de fechas, no asignar ninguna venta para evitar recuperar todas las ventas
            $compras = collect();
        }

        // Generar el PDF con las ventas filtradas o sin ventas si no hay rango de fechas
        $pdf = PDF::loadView('VistaCompra.pdf', compact('compras', 'start_date', 'end_date'));

        // Devolver el PDF como una descarga o visualización en el navegador
        return $pdf->stream();
        // Para descargar el PDF directamente, puedes usar: return $pdf->download('reporte.pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $compra = Compra::findOrFail($request->id);

        // Eliminar la venta y sus detalles relacionados
        $compra->detallecompra()->delete();
        $compra->delete();

        // Redirige de vuelta a la lista de ventas con un mensaje de éxito
        return redirect()->route('compra.reporte')->with('success', 'compra eliminada correctamente');
    }
}
