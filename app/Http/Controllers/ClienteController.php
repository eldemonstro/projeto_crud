<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Pedido;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id','desc') -> paginate(5);
        return view('clientes.clientes') -> with('clientes' , $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'fone' => 'required|min:9'

            ]);
        $cliente = new Cliente();
        $cliente -> nome = $request -> input('nome');
        $cliente -> email = $request -> input('email');
        $cliente -> fone = $request -> input('fone');
        
        $cliente -> save();
        return redirect('/clientes') -> with('success', 'Cliente criado com sucesso');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.editar') -> with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente -> nome = $request -> input('nome');
        $cliente -> email = $request -> input('email');
        $cliente -> fone = $request -> input('fone');
        $cliente -> save();
        return redirect('/clientes') -> with('success', 'Cliente editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente -> delete();
        return redirect('/clientes') -> with('success', 'Cliente deletado');
    }
}
