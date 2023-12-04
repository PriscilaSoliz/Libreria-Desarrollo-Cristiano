<?php

namespace App\Http\Controllers;

use App\Models\detalleventa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Venta;
use App\Models\cliente;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $producto = producto::all();
        $venta = Venta::all();
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();

        $venta_id = $request->input('venta_id');
        $venta = Venta::find($venta_id);

        // Luego, pasas los detalles de la venta a la vista
        return view('VistaDetalleventa.index', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'));
    }
    public function verdetalle(venta $venta){
        // Aquí obtienes los detalles de la venta actual
        $detalleventa = Detalleventa::where('venta_id', $venta->id)->get();

        // Pasas los datos de la venta y los detalles a la vista
        return view('VistaDetalleventa.verdetalle', compact('venta', 'detalleventa'));
    }


    public function pdf(Request $request){
        $venta_id = $request->input('venta_id');
        $venta = Venta::find($venta_id);

        $detalleventa = DetalleVenta::where('venta_id', $venta_id)->get();
        // Supongo que necesitas filtrar los detalles de venta relacionados con la venta específica
        $pdf = PDF::loadView('VistaDetalleventa.pdf', compact('detalleventa', 'venta'));
        return $pdf->stream();
        // También puedes descargar el PDF usando return $pdf->download('reporte.pdf');
    }

    public function pdfqr(){
        $detalleventa=detalleventa::all();
        $pdf = Pdf::loadView('VistaDetalleventa.pdfqr', compact('detalleventa'));
        return $pdf->stream();
     //   return $pdf->download('reporte.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detalleventa = detalleventa::all();
        return view('VistaDetalleventa.Create', compact('detalleventa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $venta_id = $r->input('venta_id');
        $detalleVenta = new detalleventa();
        // dd($venta_id); // Verifica si $venta_id tiene el valor esperado

        // $venta = Venta::find($venta_id);
        // dd($venta);
        $detalleVenta->precio = $r->precio;
        $detalleVenta->cantidad = $r->cantidad;
        $detalleVenta->subtotal = $r->subtotal; // Ajusta esto según tu lógica
        // Se asume que 'producto_id' se obtiene del campo 'producto_id' del formulario
        $detalleVenta->venta_id = $r->venta_id; // Ajusta esto según tu lógica
        $detalleVenta->producto_id = $r->producto_id;
        $detalleVenta->save();

        $producto = producto::all();
        $venta = Venta::all();
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();

        activity()
            ->causedBy(auth()->user())
            ->log('Registro venta con id: '.$detalleVenta->venta_id);

   //  return redirect()->route('detalleventa.index');
        $venta_id = $r->input('venta_id');
        $venta = Venta::find($venta_id);
        return view('VistaDetalleventa.index', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'));
    }
    /**
     * Display the specified resource.
     */
    public function show(detalleventa $detalleventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalleventa $detalleventa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalleventa $detalleventa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detalleventa = detalleventa::findOrFail($id);
        $venta_id = $detalleventa->venta_id; // Obtener el ID de venta antes de eliminar el detalle

        $detalleventa->delete();

        // Recuperar los datos necesarios después de la eliminación
        $producto = producto::all();
        $venta = Venta::find($venta_id);
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();

        // Retornar a la vista con los datos actualizados
        return view('VistaDetalleventa.index', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'))->with('success', 'Detalle venta eliminado correctamente');
    }

    public function eliminar($id)
    {
        $detalleventa = detalleventa::findOrFail($id);
        $venta_id = $detalleventa->venta_id; // Obtener el ID de venta antes de eliminar el detalle

        $detalleventa->delete();

        // Recuperar los datos necesarios después de la eliminación
        $producto = producto::all();
        $venta = Venta::find($venta_id);
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();

        // Retornar a la vista con los datos actualizados
        return view('VistaDetalleventa.verdetalle', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'))->with('success', 'Detalle venta eliminado correctamente');
    }

}
