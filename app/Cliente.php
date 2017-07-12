<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = [
		'nome',
		'email',
		'fone'
	];

	public function pedidos(){
		return $this -> hasMany('App\Pedido', 'id_cliente');
	}

}
