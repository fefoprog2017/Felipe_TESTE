<?php
	include "include/cabecalho.php";
?>

<div class="container">
	<h2>Adicionar motorista</h2>
	<h6>* Campos obrigatorios.</h6>
	<form method="post" action="salvar_m.php">
		<div class="form-group">
			<label>Nome:*</label>
			<input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto">
		</div>
		<div class="form-group">
			<label>Data de Nascimento:*</label>
			<input type="text" name="nascimento" class="form-control" placeholder="ANO/MES/DIA">
		</div>
		<div class="form-group">
			<label>CPF:*</label>
			<input type="text" name="cpf" class="form-control" placeholder="XXX.XXX.XXX-XX">
		</div>
		<div class="form-group">
			<label>Veiculo:*</label>
			<input type="text" name="veiculo" class="form-control" placeholder="Digite o modelo do veiculo">
		</div>
		<div class="form-group">
			<label>Status:*</label>
			<input type="text" name="situacao" class="form-control" placeholder="Digito o status do motorista">
		</div>
		<div class="form-group">
			<label>Sexo:*</label>
			<input type="text" name="sexo" class="form-control" placeholder="M/F">
		</div>
		<button type="submit" class="btn btn-success">Salvar</button>
	</form>
</div>

<?php
	include "include/rodape.php";
?>