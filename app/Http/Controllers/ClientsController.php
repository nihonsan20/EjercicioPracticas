<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('index');
    }

   
    public function create()
    {
        $clients = Client::all(); 
        return view('pedido', ['clients' => $clients]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'idClient' => 'required|integer',
        ]);
        /**
         * Se tiene en cuenta la cantidad de caracteres que se pueden ingresar en el campo nombre y email
         * author: Nicolas Torres Acosta
         */

        if ($request->idClient == 0) {
            return redirect()->route('clients.create')->with('error', 'El id del cliente no puede ser 0');
        }

        // Buscar si el cliente ya existe por ID
        $client = Client::where('idClient', $request->idClient)->first();

        if ($client) {
            // Cliente ya existe → simular login y redirigir a pedido
            session(['client' => $client]);
            return redirect()->route('pedido')->with('message', 'Bienvenido de nuevo, ' . $client->nombre);
        }

        // Cliente no existe → crear nuevo registro
        $client = Client::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'idClient' => $request->input('idClient'),
        ]);
        /** 
         * Se crea un nuevo cliente con los datos ingresados en el formulario
         * author: Nicolas Torres Acosta
         */

        // Guardar en sesión y redirigir a pedido
        session(['client' => $client]);
        return redirect()->route('pedido')->with('message', 'Cliente registrado correctamente, bienvenido ' . $client->nombre);
    }


    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'email' => 'required|email|max:150|unique:clients,email',
            'idClient' => 'required|integer|unique:clients,idClient',
        ]);

        if ($request->idClient == 0) {
            return redirect()->route('clients.create')->with('error', 'El ID del cliente no puede ser 0');
        }

        $client = Client::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'idClient' => $request->idClient,
        ]);

        session(['client' => $client]);
        return redirect()->route('pedido')->with('message', 'Cliente registrado correctamente, bienvenido ' . $client->nombre);
    }

    public function login(Request $request)
    {
        $request->validate([
            'idClient' => 'required|integer',
        ]);
    
        // Buscar si el cliente existe
        $client = Client::where('idClient', $request->idClient)->first();
    
        if ($client) {
            // Iniciar sesión (guardar en la sesión)
            session(['client' => $client]);
    
            // Redirigir a la página de pedido
            return redirect()->route('pedido')->with('message', 'Bienvenido de nuevo, ' . $client->nombre);
        } else {
            return redirect()->back()->with('error', 'Cliente no encontrado');
        }
    }



    public function agregarProducto(Request $request)
    {
        $producto = $request->input('producto');
        $carrito = session('carrito', []);

        if (isset($carrito[$producto])) {
            $carrito[$producto]++;
        } else {
            $carrito[$producto] = 1;
        }

        session(['carrito' => $carrito]);

        $total = array_sum($carrito);
        session(['contador' => $total]);

        return redirect()->back();
    }
    

    public function eliminarProducto(Request $request)
    {
        $producto = $request->input('producto');
        $carrito = session('carrito', []);

        if (isset($carrito[$producto])) {
                $carrito[$producto]--;

            if ($carrito[$producto] <= 0) {
                    unset($carrito[$producto]);
                }
        }

            session(['carrito' => $carrito]);
            session(['contador' => array_sum($carrito)]);

            return redirect()->back();
    }
    
    public function enviarPedido(Request $request)
    {

            $carrito = session('carrito', []);

            if (empty($carrito)) {
                return redirect()->back()->with('error', 'No hay productos en el pedido.');
            }

            session(['pedido' => $carrito]);
        
            session()->forget('carrito');
            session()->forget('contador');
        
            return view('orden')->with('success', 'Pedido enviado correctamente.');
            return view('pedidoFinalizado');
    
    
    }   

    


    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
