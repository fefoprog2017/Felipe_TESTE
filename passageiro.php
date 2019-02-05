<?php
	include "include/cabecalho.php";
?>

<div class="container">
	<h2>Adicionar passageiro</h2>
	<h6>* Campos obrigatorios.</h6>
	<form method="post" action="salvar_p.php">
		<div class="form-group">
			<label>Nome:*</label>
			<input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto">
		</div>
		<div class="form-group">
			<label>Data de Nascimento:*</label>
			<input type="text" name="nascimento" class="form-control" placeholder="Digite a data">
		</div>
		<div class="form-group">
			<label>CPF:*</label>
			<input type="text" name="cpf" class="form-control" placeholder="Digite o n° do documento">
		</div>

		<div class="form-group">
			<label>Sexo:*</label>
			<input type="text" name="sexo" class="form-control" placeholder="Digite o sexo M/F">
		</div>
		<button class="btn btn-success">Salvar</button>
	</form>
</div>

<?php
	include "include/rodape.php";
?>