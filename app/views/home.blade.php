<form action="{{route('home.ligacoes')}}">
<label>Cidade A:</label>
{{Form::select('local', $cidades)}}<br>
<label>Cidade B:</label>
{{Form::select('destino', $cidades)}}<br>
<button id="cadastrar">Ver Ligações</button>
</form>