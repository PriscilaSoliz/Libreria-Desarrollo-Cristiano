<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Factura de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Agregar estilos personalizados -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .cabecera {
            background-color: #343a40;
            color: white;
        }

        .logo {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .titulo {
            margin-bottom: 20px;
        }

        .tabla-ventas {
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .tabla-ventas th,
        .tabla-ventas td {
            padding: 12px;
        }

        .tabla-ventas th {
            background-color: #343a40;
            color: white;
        }

        /* Estilos para el pie de página */
        .pie-pagina {
            margin-top: 10px;
            background-color: #f8f9fa;
            padding: 5px;
            border: 1px solid #dee2e6; /* Borde gris claro */
            border-radius: 5px; /* Esquinas redondeadas */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo text-center">
            <img src="img/newlogo.png" alt="Logo" width="80px" height="80px">
        </div>
        <div class="titulo text-center">
            <h1>Reportes de Compras</h1>
        </div>
        <table class="table tabla-ventas">
            <thead class="cabecera">
                <tr>
                    <th>Nro</th>
                    <th>Tipo de pago</th>
                    <th>CI</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compra as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->formapago }}</td>
                    <td>{{ $v->cliente_id }}</td>
                    <td>{{ $v->provedor->nombre }}</td>
                    <td>{{ $v->created_at->format('Y-m-d') }}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pie de página -->
    <div class="pie-pagina text-center">
        <p class="text-muted">
            <strong>Ubicación:</strong> Santa Cruz de la Sierra - 3er anillo
                                           – Av. Noel Kempff Mercado
        </p>
        <p class="text-muted">
            <strong>Redes Sociales:</strong> @Librería Desarrollo Cristiano
        </p>
    </div>
</body>
</html>
