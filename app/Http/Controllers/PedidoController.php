<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Cliente;
use App\Pedido;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $pedidos = Pedido::orderBy('id','desc') -> paginate(5);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedidos.pedidos') -> with('pedidos', $pedidos) -> with('clientes', $clientes) -> with ( 'produtos', $produtos);
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
            'id_cliente' => 'required|numeric|min:1',
            'id_produto' => 'required|numeric|min:1'
            ]);
        $pedido = new Pedido();
        $pedido -> id_cliente = $request -> input('id_cliente');
        $pedido -> id_produto = $request -> input('id_produto');
        $pedido -> save();
        return redirect('/pedidos') -> with('success', 'Pedido Criado');

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
        $pedido = Pedido::find($id);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedidos.editar') -> with('pedido', $pedido)-> with('clientes', $clientes)-> with('produtos', $produtos);
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
        $pedido = Pedido::find($id);
        $pedido -> id_cliente = $request -> input('id_cliente');
        $pedido -> id_produto = $request -> input('id_produto');
        $pedido -> save();
         return redirect('/pedidos') -> with('success', 'Pedido Editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido -> delete();
        return redirect('/pedidos') -> with('success', 'Pedido Deletado');
    }
}
