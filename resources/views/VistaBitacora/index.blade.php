@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Estilos para el contenedor principal */
        .container {
            margin: 20px auto;

        }

        /* Estilos para el contenedor de la bitácora */
        #report-container {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilos para la tabla en la versión impresa */
        @media print {
            .activities-table {
                border-collapse: collapse;
                width: 100%;
                margin: 20px 0;
            }

            .activities-table th,
            .activities-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .activities-table th {
                background-color: #f2f2f2;
            }
        }
    </style>

    <div class="my-8 mx-8">
        <div class="container mx-auto">
            <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
                <div class="mt-3">
                    <button onclick="imprimirBitacora()"
                    class="bg-cyan-500 hover:bg-cyan-700 text-white font-semibold px-4 py-2 rounded-lg">
                    Imprimir
                </button>
                </div>

                <!-- Contenedor centrado para el Reporte de Bitácora -->
                <div id="report-container">
                    <h1 class="text-2xl font-semibold mb-4">Reporte Bitacora</h1>
                </div>

                <form action="{{ route('bitacora.reporte') }}" method="GET">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-1/2">
                        <label for="start_date" class="text-gray-600 font-semibold text-sm">Fecha de inicio:</label>
                        <input type="date" id="start_date" name="start_date"
                            class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            value="{{ $start_date ?? '' }}">
                    </div>
                    <div class="w-1/2">
                        <label for="end_date" class="text-gray-600 font-semibold text-sm">Fecha de fin:</label>
                        <input type="date" id="end_date" name="end_date"
                            class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            value="{{ $end_date ?? '' }}">
                    </div>

                        <div class="mt-3">
                            <button type="submit"
                                class="bg-blue-500  hover:bg-blue-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                                Filtrar
                            </button>
                        </div>

                </div>

                <!-- Tabla con estilos mejorados -->
                <div id="activities_table" class="activities-table">
                    @include('VistaBitacora.activities_table')
                </div>
            </div>
        </div>
    </div>

    <script>
        function imprimirBitacora() {
            var ventanaImpresion = window.open('', '_blank');
            var contenido = `
                <html>
                <head>
                    <title>Reporte de Bitácora</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 12px; /* Cambia el tamaño de la fuente a 12px */
                        }
                        .logo {
                            max-width: 200px;
                            max-height: 100px;
                        }
                        .table-print {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        .table-print th, .table-print td {
                            border: 1px solid #000;
                            padding: 8px;
                            text-align: center;
                        }
                        .report-header {
                            text-align: center;
                            margin-bottom: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class="report-header">
                        <img src="file:///C:/xampp/htdocs/Libreria-Desarrollo-Cristiano/public/img/Loguito.png" alt="Logotipo de la empresa" class="logo" />
                        <h1 class="text-2xl font-semibold mb-4">Reporte de Bitácora</h1>
                    </div>
                    <table class="table-print">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Actividad</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>`;

            var activities = document.querySelectorAll('.activity-row');
            activities.forEach(function(activity) {
                contenido += '<tr>';
                var cells = activity.querySelectorAll('td');
                cells.forEach(function(cell) {
                    contenido += '<td>' + cell.innerText + '</td>';
                });
                contenido += '</tr>';
            });

            contenido += `
                        </tbody>
                    </table>
                </body>
                </html>`;

            ventanaImpresion.document.write(contenido);
            ventanaImpresion.document.close();
            ventanaImpresion.print();
        }
    </script>




@endsection
