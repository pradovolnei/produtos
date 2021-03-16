<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base;
use Auth;

class Produtos extends Base
{
    protected $table = "produtos";
	
	public function listar ()
    {
		$exibir = self::select();
		//$exibir->LeftJoin("secoes", "secoes.id", "=", "artigos.id_secao");

		return $exibir->get();
    }
}