<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
		'id_cliente',
		'id_produto'
	];

	public function clientes(){
		return $this -> belongsTo('App\Cliente', 'id_cliente');
	}
	public function produtos(){
		return $this -> belongsTo('App\Produto', 'id_produto');
	}

}
