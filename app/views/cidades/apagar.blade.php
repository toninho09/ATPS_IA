<form action="{{route('cidade.deletar')}}" method="POST">
<label>Cidade A:</label>
{{Form::select('cidade', $cidades)}}<br>
<button id="apagar">apagar</button>
</form>

<br><br>
<a href="{{route('home')}}">Voltar</a>