@extends('layouts.app')
@section('content')
<div class="my-8 mx-8">
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            <h2 class="text-3xl text-black font-semibold mb-6">Bitácora</h2>
            <div class="flex items-center space-x-4 mb-6">
                <div class="w-1/2">
                    <label for="start_date" class="text-gray-600 font-semibold text-sm">Fecha de inicio:</label>
                    <input type="date" id="start_date" name="start_date" class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="w-1/2">
                    <label for="end_date" class="text-gray-600 font-semibold text-sm">Fecha de fin:</label>
                    <input type="date" id="end_date" name="end_date" class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <button onclick="imprimirContenido()" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                    Imprimir
                </button>
            </div>
            <div id="activities_table">
                @include('VistaBitacora.activities_table')
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function() {
        // Obtén los inputs de fecha
        var startDateInput = $('#start_date');
        var endDateInput = $('#end_date');

        // Detecta los cambios en los inputs de fecha
        startDateInput.on('change', fetchFilteredActivities);
        endDateInput.on('change', fetchFilteredActivities);

        // Función para obtener los resultados filtrados mediante una solicitud AJAX
        function fetchFilteredActivities() {
            // Obtén los valores de fecha
            var startDate = startDateInput.val();
            var endDate = endDateInput.val();

            // Realiza la solicitud AJAX
            $.ajax({
                url: '{{ route('bitacora.index') }}',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    // Actualiza la tabla con los resultados filtrados
                    $('#activities_table').html(response.view);
                }
            });
        }
    });
</script>