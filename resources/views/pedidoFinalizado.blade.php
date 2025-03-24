<!DOCTYPE html>
<html>
<head>
    <title>Pedido Finalizado</title>
</head>
<body>
    <h1>¡Gracias por tu pedido!</h1>
    @if(session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>