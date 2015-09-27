<label>Nome:</label>
<input name="nome" id="nome" placeholder="Nome"></input><br>
<button id="cadastrar">Cadastrar</button>
<br><br>
<a href="{{route('home')}}">Voltar</a>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	var enviando = false;
	$("#cadastrar").click(function(){
		if($("#nome").val() =='') {
			alert('O campo nome não pode ser vazio.');
			return;
		}
		if(enviando == false){
		enviando = true;
		$.post('{{route('cidades.salvar')}}',{'nome':$("#nome").val()},
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