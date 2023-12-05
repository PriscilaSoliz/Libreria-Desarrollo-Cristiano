<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Spatie\Activitylog\Models\Activity;

class BitacoraController extends Controller
{
    //
    public function index(Request $request)
    {

        $activities = Activity::all();
        // Pasar los datos a la vista 'VistaBitacora.index'
        return view('VistaBitacora.index', compact('activities'));
    }
 //   return view('VistaBitacora.index', compact('activities', 'start_date', 'end_date'));
    public function reporte(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Verificar si se proporcionaron ambas fechas
        if ($start_date && $end_date) {
            // Incrementar la fecha final por un día
            $end_date_modified = date('Y-m-d', strtotime($end_date . ' +1 day'));

            // Filtrar las ventas según el rango de fechas proporcionado, incluyendo el día siguiente al end_date
            $activities = Activity::whereBetween('created_at', [$start_date, $end_date_modified])->get();
        } else {
            // Si falta alguna fecha, podrías manejarlo como desees
            // Por ejemplo, podrías mostrar un mensaje de error o cargar todas las ventas
            $activities = Activity::all(); // Esto cargaría todas las ventas si falta alguna fecha
        }

        return view('VistaBitacora.index', [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'activities' => $activities
        ]);
    }
}
