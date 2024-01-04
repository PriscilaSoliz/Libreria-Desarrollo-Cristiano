<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Factura</title>
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
            border: 1px solid #dee2e6;
            /* Borde gris claro */
            border-radius: 5px;
            /* Esquinas redondeadas */
        }

        .text-align-right {
            text-align: right;
        }
    </style>
    <!-- Tu tabla y otros elementos HTML -->

    <!-- Tu código HTML de la tabla y otros elementos -->

</head>

<body>
    <div class="container">
        <div class="logo text-center">
            <img src="img/newlogo.png" alt="Logo" width="80px" height="80px">
        </div>
        <div class="titulo text-center">
            <h1>Factura de Ventas</h1>
        </div>
        <div>
            @foreach ($detalleventa as $detalleVenta)
            <p>Detalle de Venta ID: {{ $detalleVenta->id }}</p>
            <p>Producto: {{ $detalleVenta->producto }}</p>

            {{-- Acceder al cliente desde DetalleVenta --}}
            <p>Cliente: {{ $detalleVenta->cliente->nombre }}</p>

            <hr>
        @endforeach
        </div>

        <table class="table tabla-ventas">
            <thead class="cabecera">
                <tr>
                    <th class="px-4 py-3 text-center">Producto</th>
                    <th class="px-4 py-3 text-center">Precio</th>
                    <th class="px-4 py-3 text-center">Desuento</th>
                    <th class="px-6 py-3 text-center">Cantidad</th>
                    <th class="px-8 py-3 text-center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                    $total = 0;
                @endphp
                @foreach ($detalleventa as $v)
                    <td style="display: none;">
                        <p class="text-normal text-center">{{ $v->id }}</p>
                    </td>
                    @if ($v->venta_id && $venta && $v->venta_id == $venta->id)
                        <tr>
                            {{-- <td class="py-3 text-sm text-center">{{$v->venta_id}}</td> --}}
                            <td>{{ $v->producto->nombre }}</td>
                            <td>{{ $v->precio }}</td>
                            <td>{{ $v->descuento }}</td>
                            <td>{{ $v->cantidad }}</td>
                            <td>{{ $v->subtotal }}</td>
                        </tr>
                        @php
                            $i++;
                            $total += $v->subtotal; // No uses number_format() aquí
                        @endphp
                    @endif
                @endforeach
            </tbody>
            <div class="flex justify-between">
                <div class="ml-auto">
                    <label for="total" class="text-xs font-bold mb-0 sm:text-sm lg:text-base" style="text-align: right;">
                        Total: {{ number_format($total, 2) }} Bs
                    </label>
                </div>
            </div>

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
