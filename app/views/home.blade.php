
<a href="{{route('cidade.cadastrar')}}">Cadastrar Cidade</a><br>
<a href="{{route('cidade.deletarHome')}}">Apagar Cidade</a><br>
<a href="{{route('ligacao.cadastar')}}">Cadastrar Ligacao</a>
<hr>
<br><br>

<form action="{{route('home.ligacoes')}}">
<label>Cidade A:</label>
{{Form::select('local', $cidades)}}<br>
<label>Cidade B:</label>
{{Form::select('destino', $cidades)}}<br>
<button id="cadastrar">Ver Ligações</button>
</form>