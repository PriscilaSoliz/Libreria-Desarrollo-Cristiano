<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Venta;
use App\Models\cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venta = Venta::get();
        $cliente = cliente::all();
        return view('VistaVenta.index', compact('venta', 'cliente'));
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
            $ventas = Venta::whereBetween('created_at', [$start_date, $end_date_modified])->get();
        } else {
            // Si falta alguna fecha, podrías manejarlo como desees
            // Por ejemplo, podrías mostrar un mensaje de error o cargar todas las ventas
            $ventas = Venta::all(); // Esto cargaría todas las ventas si falta alguna fecha
        }

        return view('VistaVenta.reporte', [
            'venta' => $ventas,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }

    public function pdf(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            // Incrementar la fecha final por un día
            $end_date_modified = date('Y-m-d', strtotime($end_date . ' +1 day'));

            // Filtrar las ventas según el rango de fechas proporcionado, incluyendo el día siguiente al end_date
            $ventas = Venta::whereBetween('created_at', [$start_date, $end_date_modified])->get();
        } else {
            // Si no se proporciona un rango de fechas, no asignar ninguna venta para evitar recuperar todas las ventas
            $ventas = collect();
        }

        // Generar el PDF con las ventas filtradas o sin ventas si no hay rango de fechas
        $pdf = PDF::loadView('VistaVenta.pdf', compact('ventas', 'start_date', 'end_date'));

        // Devolver el PDF como una descarga o visualización en el navegador
        return $pdf->stream();
        // Para descargar el PDF directamente, puedes usar: return $pdf->download('reporte.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $venta = Venta::all();
        // return view('VistaVenta.Create', compact('venta'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {

        $venta = new Venta();

        $venta->cliente_id = $r->input('ci');
        $venta->formapago = $r->input('formapago');
        // dd($venta->cliente_id);
        // Obtener el ID del usuario autenticado y asignarlo al campo usuario_id de la venta
        $usuario_id = Auth::id();
        $venta->usuario_id = $usuario_id;
        $venta->save();
        // Obtener el ID de la venta recién creada
        $venta_id = $venta->id;


        session()->flash('success', 'La Venta se ha realizado exitosamente');

        // Redirigir a la ruta 'detalleventa.index' con el ID de la venta como parámetro
        return redirect()->route('detalleventa.index', ['venta_id' => $venta_id])->with('success', 'Nota de Venta Registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $venta = Venta::findOrFail($request->id);

        // Eliminar la venta y sus detalles relacionados
        $venta->detalleventas()->delete();
        $venta->delete();

        // Redirige de vuelta a la lista de ventas con un mensaje de éxito
        return redirect()->route('venta.reporte')->with('success', 'Venta eliminada correctamente');
    }
}
