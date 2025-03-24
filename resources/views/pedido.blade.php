<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pedido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .usuario {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 15px 25px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .usuario h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .layout {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
        padding: 40px;
        max-width: 1200px;
        margin: 0 auto;
        }

        .lista-carrito {
            flex: 1;
            max-width: 300px;
        }
        
        .contador {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
        }

        .contenedor-productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px 10px;
            margin-top: 100px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .carta {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            width: 200px;
        }

        .carta h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .boton-agregar {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .boton-agregar:hover {
            background-color: #218838;
        }

        .lista-carrito {
            margin-top: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .lista-carrito ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .lista-carrito li {
            font-size: 14px;
            padding: 4px 0;
        }
    </style>
</head>
    <body>

            <div class="usuario">
                 @if(session('client'))
                    <h1>Hola {{ session('client')->nombre }}, vamos a hacer tu pedido</h1>
                 @endif
            </div>

            <div class="contador">
                Productos agregados: {{ session('contador', 0) }}
            </div>

            <div class="layout">
            <div class="contenedor-productos">
                @php
                    $productos = ['Helado', 'Papas Fritas', 'Yogurt', 'Leche', 'Huevos', 'Panela', 'Arroz', 'Pollo', 'Pan'];
                @endphp

                @foreach($productos as $producto)
                    <div class="carta">
                        <h3>{{ $producto }}</h3>

                        <form action="{{ route('client.agregarProducto') }}" method="POST" style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="producto" value="{{ $producto }}">
                            <button type="submit" class="boton-agregar">Agregar</button>
                        </form>

                        <form action="{{ route('client.eliminarProducto') }}" method="POST" style="display: inline-block; margin-left: 5px;">
                            @csrf
                            <input type="hidden" name="producto" value="{{ $producto }}">
                            <button type="submit" class="boton-agregar" style="background-color: #dc3545;">Eliminar</button>
                        </form>
                    </div>
                @endforeach
            </div>

            @if(session('carrito'))
                <div class="lista-carrito">
                    <h3>Tu pedido:</h3>
                    <ul>
                        @foreach(session('carrito') as $producto => $cantidad)
                            <li>{{ $producto }}: {{ $cantidad }}</li>
                        @endforeach
                    </ul>
                    <form action="{{ route('client.enviarPedido') }}" method="POST">
                         @csrf
                        <button type="submit" class="boton-agregar" style="margin-top: 20px;">Agregar Pedido</button>
                    </form>
                </div>
            @endif
        </div>
    </body>
</html>
