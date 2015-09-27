<?php

class CidadesController extends BaseController {
	
	public function cadastrarHome(){
		return View::make('cidades.cadastro');
	}
	
	public function salvar(){
		$nome = Input::get('nome','');
		$cidade = Cidades::where('nome',$nome)->first();
		if($cidade)return ['status'=>'1','msg'=>'A cidade já foi cadastra.'];
		
		$cidade = new Cidades();
		$cidade->NOME = $nome;
		$cidade->save();
		return ['status'=>'0','msg'=>'Cidade cadastrada com sucesso.'];
	}
	
}
