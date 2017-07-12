<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
		'nome',
		'preco'
	];

	public function pedidos(){
		return $this -> hasMany('App\Pedido', 'id_produto');
	}
}
