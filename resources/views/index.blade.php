<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio Prácticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 380px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-section {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Estilos adicionales para mejorar la separación */
        .form-section:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <header>
        <h1>EJERCICIO PRÁCTICAS</h1>
    </header>

    <div class="container">
        <!-- Formulario de Registro -->
        <div class="form-section">
            <h2>Registro de Cliente</h2>
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <label for="idClient">ID Cliente:</label>
                <input type="text" id="idClient" name="idClient" required>

                <label for="nombre">Nombre Cliente:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Registrar</button>
            </form>
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <div class="form-section">
            <h2>Iniciar Sesión</h2>
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <label for="idClient">ID Cliente:</label>
                <input type="text" id="idClient" name="idClient" required>

                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>

</body>
</html>
