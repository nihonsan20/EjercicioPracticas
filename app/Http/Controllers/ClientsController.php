<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedido');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'idClient' => 'required|integer',
        ]);
        /**
         * se tiene en cuenta la cantidad de caracteres que se pueden ingresar en el campo nombre y email
         * author:Nicolas Torres Acosta
         */


        
        Client::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'idClient' => $request->input('idClient'),
        ]);
        /** 
         * se crea un nuevo cliente con los datos ingresados en el formulario
         * author:Nicolas Torres Acosta
         */


        if($request->idClient == 0){
            return redirect()->route('clients.create')->with('error', 'El id del cliente no puede ser 0');
        } elseif (client::where('idClient', $request->idClient)->exists()) {
            return redirect()->route('clients.create')->with('error', 'El id del cliente ya existe');
        }
           
       
        return redirect()->route('pedido')->with('nombre', $client->nombre);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
