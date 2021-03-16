<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Cupom;
use App\Models\Base;
use App\User;

use Illuminate\Support\Facades\URL;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Produtos $produtos, Cupom $cupom)
    {
		$this->produtos = $produtos;
		$this->cupom = $cupom;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		return $this->home();
    }
	
	public function home()
    {
		$lista_produtos = $this->produtos->listar();
		
        return view('home')->with( [ "lista_produtos" => $lista_produtos ] );
    }
	
	public function novoproduto(Request $request)
	{
		$this->produtos->insert([ "nome" => $request->nome, "preco" => $request->preco, "categoria" => $request->categoria, "marca" => $request->marca, "descricao" => $request->descricao ]);
		return $this->home();
	}
	
	public function savecupom(Request $request)
	{
		$lista_cupom = $this->cupom->select()->where( [ "nome" => $request, "ativo" => 1 ])->get();
		$foreach($lista_cupom as $col_cupons){
			if($col_cupons == "geral" || $col_cupons == $request->marca || $col_cupons == $request->categoria )
		}
		$this->produtos->insert([ "nome" => $request->nome, "preco" => $request->preco, "categoria" => $request->categoria, "marca" => $request->marca, "descricao" => $request->descricao ]);
		return $this->home();
	}
	
	
}
