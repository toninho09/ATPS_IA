<label>Cidade A:</label>
{{Form::select('cidade1', $cidades)}}<br>
<label>Cidade B:</label>
{{Form::select('cidade2', $cidades)}}<br>
<label>Peso:</label>
<input name="peso" id="peso" placeholder="peso" type="number" min="1"></input>
<br><br>
<button id="cadastrar">Cadastrar</button>
<br><br>
<a href="{{route('home')}}">Voltar</a>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var enviando = false;
	$("#cadastrar").click(function(){
		if($("#peso").val() =='') {
			alert('O campo peso não pode ser vazio.');
			return;
		}
		if(enviando == false){
		enviando = true;
		$.post('{{route('ligacao.salvar')}}',
			{'cidade1':$("select[name='cidade1']").val(),
			'cidade2':$("select[name='cidade2']").val(),
			'peso':$("#peso").val()},
			function(data){
				enviando = false;
				alert(data.msg);
		},'json')
		.fail(function() {
			enviando = false;
    		alert("Ocorreu um erro.");
  		});
		}
	});
	
});
</script>