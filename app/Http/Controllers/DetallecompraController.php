<?php

namespace App\Http\Controllers;

use App\Models\detallecompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\DetalleCompraCreated;
use App\Models\Categoria;
use App\Models\producto;
use App\Models\Compra;
use App\Models\Venta;
use App\Models\Provedor;

class DetallecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $producto = producto::all();
        $compra= Compra::all();
        $provedor = Provedor::all();
        $detallecompra = detallecompra::get();

        $compra_id = $request->input('compra_id');
        $compra = compra::find($compra_id);

        // Luego, pasas los detalles de la venta a la vista
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'provedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detallecompra = detallecompra::all();
        return view('VistaDetallecompra.Create', compact('detallecompra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function vistaañadir(Request $r)
    {
        $provedor = Provedor::all(); // Obtén todos los proveedores de la base de datos
        $categoria = Categoria::all();
        $detallecompra = detallecompra::get();

        $compra_id = $r->input('compra_id');
        $compra = Compra::find($compra_id);
        return view('VistaDetallecompra.vistaañadir', ['compra' => $compra], compact('detallecompra', 'compra', 'provedor','categoria'));
    }
    public function añadir(Request $r)
    {

        $producto=new producto();
        $producto->codigo=$r->codigo;
        $producto->nombre=$r->nombre;
        $producto->autor=$r->autor;
        $producto->version=$r->version;
        $producto->editorial=$r->editorial;
        $producto->precio=$r->precio;
        $producto->proveedor_id=$r->proveedor_id;
        $producto->categoria_id=$r->categoria_id;
        $producto->save();

        $producto = producto::all();
        $compra_id = Compra::all();
        $provedor = Provedor::all();
        $detallecompra =detallecompra::get();

        $compra_id = $r->input('compra_id');
        $compra = Compra::find($compra_id);
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'provedor'));
    }


    public function verdetalle(compra $compra){
        // Aquí obtienes los detalles de la venta actual
        $detallecompra = Detallecompra::where('compra_id', $compra->id)->get();

        // Pasas los datos de la venta y los detalles a la vista
        return view('VistaDetallecompra.verdetalle', compact('compra', 'detallecompra'));
    }

    public function store(Request $r)
    {

        $compra_id = $r->input('compra_id');
        $detallecompra = new detallecompra();
   //  dd($compra_id); // Verifica si $venta_id tiene el valor esperado
        // $venta = Venta::find($venta_id);
        // dd($venta);
        $detallecompra->precio = $r->precio;
        $detallecompra->cantidad = $r->cantidad;
        $detallecompra->subtotal = $r->subtotal; // Ajusta esto según tu lógica
        // Se asume que 'producto_id' se obtiene del campo 'producto_id' del formulario
        $detallecompra->compra_id = $r->compra_id; // Ajusta esto según tu lógica
        $detallecompra->producto_id = $r->producto_id;
        $detallecompra->save();

        $producto = producto::all();
        $compra_id = Compra::all();
        $provedor = Provedor::all();
        $detallecompra =detallecompra::get();

        // activity()
        //     ->causedBy(auth()->user())
        //     ->log('Registro venta con id: '.$detallecompra->compra_id);

   //  return redirect()->route('detalleventa.index');
        $compra_id = $r->input('compra_id');
        $compra = Compra::find($compra_id);
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'provedor'));
    }

    /**
     * Display the specified resource.
     */
    public function show(detallecompra $r)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detallecompra $detallecompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detallecompra $detallecompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detallecompra = detallecompra::findOrFail($id);
        $compra_id = $detallecompra->compra_id; // Obtener el ID de venta antes de eliminar el detalle

        $detallecompra->delete();

        // Recuperar los datos necesarios después de la eliminación
        $producto = producto::all();
        $compra = Compra::find($compra_id);
        $proveedor = Provedor::all();
        $detallecompra = detallecompra::get();

        // Retornar a la vista con los datos actualizados
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'proveedor'))->with('success', 'Detalle Compra eliminado correctamente');
    }

    public function eliminar($id)
    {
        $detallecompra = detallecompra::findOrFail($id);
        $compra_id = $detallecompra->compra_id; // Obtener el ID de venta antes de eliminar el detalle

        $detallecompra->delete();

        // Recuperar los datos necesarios después de la eliminación
        $producto = producto::all();
        $compra = Compra::find($compra_id);
     
        $detalleventa = detallecompra::get();

        // Retornar a la vista con los datos actualizados
        return view('VistaDetallecompra.verdetalle', ['compra' => $compra], compact('detallecompra', 'producto', 'compra'))->with('success', 'Detalle compra eliminado correctamente');
    }
}
