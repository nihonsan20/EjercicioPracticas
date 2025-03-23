<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
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
            margin-bottom: 30px;
        }

        .container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"] {
            padding: 8px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button{
            padding: 10px 20px;
            border-radius: 5px;
            margin: 15px;
        }
     </style>   
    </head>
    <header>
            <h1>EJECICIOPRACTICAS</h1>
    </header>
    <body>
        <form action= "{{ route('clients.store')}}" method="POST">
        @csrf
        <div class = "container" >
                <h2>Registro de Cliente</h2>
                <label for="idClient">Id Cliente:</label>
                <input type="integer" id="idClient" name="idClient" required>

                <label for="nombre">Nombre Cliente:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="email">Correo Electronico</label>
                <input type="text" id="email" name="email" required>
                <button type = "submit"> registrar cliente</button>
        </div>  
        </form>
             
    </body>
</html>