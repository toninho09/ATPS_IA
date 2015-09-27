
<style>
table, th, td {
    border: 1px solid black;
}
</style>
@foreach($caminhos as $caminho)
<label>Peso da Rota:{{$caminho['total']}}</label>
	<table>
		<tr align="left">
			<th>De:</th>
			<th>Para:</th>
			<th>Peso:</th>
		</tr>
		@foreach($caminho['caminho'] as $rota)
		<tr>
			<td>{{$rota['NOME']}}</td>
			<td>{{$rota['NOME_CIDADE_LIGACAO']}}</td>
			<td>{{$rota['PESO']}}</td>
		</tr>
		@endforeach
	</table><br><br><hr><br><br>
@endforeach
@if(count($caminhos) == 0)
<label>Nenhuma rota encontrada</label>
<br><br>
@endif

<a href="{{route('home')}}">Voltar</a>