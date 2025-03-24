<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resumen del Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        .resumen {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="resumen">
        <h2>Resumen del Pedido</h2>

        @if(session('pedido'))
            <ul>
                @foreach(session('pedido') as $producto => $cantidad)
                    <li>{{ $producto }}: {{ $cantidad }}</li>
                @endforeach
            </ul>
        @else
            <p>No hay productos en tu pedido.</p>
        @endif

        <a href="{{ route('client.pedidoFinalizado') }}">Finalizar Pedido</a>
    </div>
</body>
</html>
