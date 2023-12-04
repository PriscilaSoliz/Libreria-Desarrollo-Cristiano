<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Agregar estilos personalizados -->
    <style>
        .cabecera {
            background-color: black;
            color: white;
        }
    </style>

</head>
</head>
{{-- C:\xampp\htdocs\Libreria-Desarrollo-Cristiano\public\img\newlogoo.png --}}

<body>
    <img src="img/newlogo.png" alt="" width="70px" height="70px">
    <div class="container">
        <h1 class="text-center">Nota de Venta</h1>
        <table class="table" style="text-align: center; font-size:15px">
            <thead class="cabecera">
                <tr>
                    {{-- <th class="px-2 py-3 text-center">Nro</th> --}}
                    <th class="px-4 py-3 text-center">Producto</th>
                    <th class="px-4 py-3 text-center">Precio</th>
                    <th class="px-6 py-3 text-center">Cantidad</th>
                    <th class="px-8 py-3 text-center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalleventa as $v)
                    <td style="display: none;">
                        <p class="text-normal text-center">{{ $v->id }}</p>
                    </td>
                    @if ($v->venta_id && $venta && $v->venta_id == $venta->id)
                    <tr>
                        {{-- <td class="py-3 text-sm text-center">{{$v->venta_id}}</td> --}}
                        <td class="py-3 text-sm text-center">{{ $v->producto->nombre }}</td>
                        <td class="py-3 text-sm text-center">{{ $v->precio }}</td>
                        <td class="py-3 text-sm text-center">{{ $v->cantidad }}</td>
                        <td class="py-3 text-sm text-center">{{ $v->subtotal }}</td>

                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
