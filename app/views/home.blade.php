
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

<hr>
<br><br>
<label>Grupo do trabalho:</label><br>
<label>Antonio Henrique Lorenzon dos Santos - 6814016110</label><br>
<label>Breno Vicentim - 7086561978</label><br>
<label>Renato de Souza - 7476682279</label><br>
<label>Richard Donizete - 6814004983</label><br>