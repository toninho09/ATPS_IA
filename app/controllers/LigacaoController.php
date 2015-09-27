<?php

class LigacaoController extends BaseController {
	
	public function cadastrar(){
		$cidades = Cidades::lists('NOME','ID');
		return View::make('cidades.ligacao')
		->with('cidades',$cidades);
	}
	
	public function salvar(){
		$cidade1 = Input::get('cidade1');
		$cidade2 = Input::get('cidade2');
		$peso = Input::get('peso',0);
		if($cidade1 == $cidade2) return ['status'=>'1','msg'=>'As Ligações devem ser entre cidades diferentes.'];
		if(!is_numeric($peso) || $peso <= 0 ) return ['status'=>'1','msg'=> 'Peso inválido'];
		$ligacao = Ligacoes::where('ID_CIDADE1',$cidade1)->where('ID_CIDADE2',$cidade2)->first();
		if($ligacao) return ['status' => '1' , 'msg'=>'Ligação já cadastrada.'];
		$ligacao = Ligacoes::where('ID_CIDADE1',$cidade2)->where('ID_CIDADE2',$cidade1)->first();
		if($ligacao) return ['status' => '1' , 'msg'=>'Ligação já cadastrada.'];
		$ligacao = new Ligacoes();
		$ligacao->ID_CIDADE1 = $cidade1;
		$ligacao->ID_CIDADE2 = $cidade2;
		$ligacao->PESO = $peso;
		$ligacao->save();
		return ['status' => '0' , 'msg'=>'Ligação cadastrada com sucesso.'];
	}
	
}
