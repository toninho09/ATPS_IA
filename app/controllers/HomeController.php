<?php

class HomeController extends BaseController {

	
	public function home(){
		$cidades = Cidades::lists('NOME','ID');
		return View::make('home')
		->with('cidades',$cidades);
	}
	
	public function ligacoes(){
		set_time_limit(0);
		$local = Input::get('local');
		$destino = Input::get('destino');
		$caminhos = [];
		$visitadas = [];
		$visitadas[] = (object)["ID_CIDADE_LIGACAO"=>$local];
		$this->achaLigacoes($local,$destino,$visitadas,$caminhos);	
		$caminhos = $this->formatarCaminhos($caminhos);
		$caminhos = $this->ordenarCaminhos($caminhos);
		//return json_encode($caminhos);
		return View::make('cidades.mostrarLigacoes')->with('caminhos',$caminhos);
	}
	
	private function achaLigacoes($local,$destino,&$visitadas,&$caminhos){
		Log::debug([$local,$destino,$visitadas]);
		$cidades = VWLigacoes::where('ID',$local)->get();
		if(count($cidades) == 0) return false;
		foreach($cidades as $cit){
			if(in_array($cit->ID_CIDADE_LIGACAO,$this->getIdsVisitadas($visitadas))) continue;
			if($cit->ID_CIDADE_LIGACAO == $destino){
				$visitadas[] = $cit;
				$cpvisitadas = $visitadas;
				array_shift($cpvisitadas);
				$caminhos[] = $cpvisitadas;
				array_pop($visitadas);
				continue;
			}
			$visitadas[] = $cit;
			if($this->achaLigacoes($cit->ID_CIDADE_LIGACAO,$destino,$visitadas,$caminhos))return true;
			array_pop($visitadas);
		}
		return false;
	}
	
	private function getIdsVisitadas($visitadas){
		$ids =[];
		foreach($visitadas as $vis){
			$ids[] = $vis->ID_CIDADE_LIGACAO;
		}
		return $ids;
	}
	
	private function formatarCaminhos($caminhos){
		$caminhoFormatado =[];
		foreach($caminhos as $cam){
			$total = 0;
			foreach($cam as $c){
				$total += $c->PESO;
			}
			$temp =[];
			$temp['caminho'] = $cam;
			$temp['total'] = $total;
			$caminhoFormatado[]=$temp;
		}
		return $caminhoFormatado;
	}
	
	private function ordenarCaminhos($caminho){
		usort($caminho,function($a,$b){
			if($a['total'] <$b['total'] ) return -1;
			if($a['total'] >$b['total'] ) return 1;
			return 0;
		});
		return $caminho;
	}
}
