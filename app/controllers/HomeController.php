<?php

class HomeController extends BaseController {

	
	public function home(){
		$cidades = Cidades::lists('NOME','ID');
		return View::make('home')
		->with('cidades',$cidades);
	}
	
	public function ligacoes(){
		$local = Input::get('local');
		$destino = Input::get('destino');
		$caminhos = [];
		$visitadas = [];
		$visitadas[] = (int)$local;
		$this->achaLigacoes($local,$destino,$visitadas,$caminhos);
		$listaCidades = [];
		foreach($visitadas as $visit){
			$cidade = Cidades::where('ID',$visit)->first();
			$listaCidades[] = $cidade;
		}
		$listaCaminhos =[];
		foreach($caminhos as $cami){
			$caminhoFormat =[];
			foreach($cami as $visit){
				$cidade = Cidades::where('ID',$visit)->first();
				$caminhoFormat[] = $cidade;
			}
			$listaCaminhos[] = $caminhoFormat;
		}
		
		return json_encode([$listaCidades,$listaCaminhos]);
	}
	
	private function achaLigacoes($local,$destino,&$visitadas,&$caminhos){
		Log::debug([$local,$destino,$visitadas]);
		$cidades = VWLigacoes::where('ID',$local)->get();
		if(count($cidades) == 0) return false;
		foreach($cidades as $cit){
			if(in_array($cit->ID_CIDADE_LIGACAO,$visitadas)) continue;
			if($cit->ID_CIDADE_LIGACAO == $destino){
				$visitadas[] = $cit->ID_CIDADE_LIGACAO;
				$caminhos[] = $visitadas;
				array_pop($visitadas);
				continue;
			}
			$visitadas[] = $cit->ID_CIDADE_LIGACAO;
			if($this->achaLigacoes($cit->ID_CIDADE_LIGACAO,$destino,$visitadas,$caminhos))return true;
			array_pop($visitadas);
		}
		return false;
	}
}
