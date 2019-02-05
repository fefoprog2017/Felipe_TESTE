<?php

	include 'include/conexao.php';
	include 'include/cabecalho.php';

    //Verificando a Var ID, se esta correta ou NULL.
	if (!isset($_GET['id'])) {
		header("Location: listar_passageiro.php");
		exit;
	}
    //Variavel criada para printar com format.
	$sql = sprintf(
		"SELECT * FROM passageiro WHERE id = %d",
		$_GET['id']
	);
	//Verificação de linhas passando a variavel que contem os dados buscados no BD.
	$query = mysqli_query($conn, $sql);

	if (mysqli_num_rows($query) == 0) {
		header("Location: listar_passageiro.php");
		exit;
	}
    //Obtendo o resultado como array.
	$p = mysqli_fetch_array($query);

?>

<div class="container">
	<h2>Editar <i><?= $p['id']; ?></i></h2>
	<form method="post" action="salvar_p.php?id=<?= $p['id']; ?>">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" placeholder="Digite o nome correto" value="<?= $p['nome']; ?>">
		</div>
		<div class="form-group">
			<label>Data Nascimento:</label>
			<input type="text" name="nascimento" class="form-control" placeholder="Digite a data correta" value="<?= $p['nascimento']; ?>">
		</div>
		<div class="form-group">
			<label>Documento:</label>
			<input type="text" name="cpf" class="form-control" placeholder="Digite o documento correto" value="<?= $p['cpf']; ?>">
		</div>
		<div class="form-group">
			<label>SEXO:</label>
			<input type="text" name="sexo" class="form-control" placeholder="Digite o sexo correto" value="<?= $p['sexo']; ?>">
		</div>
		<button class="btn btn-success">Salvar</button>
		<button type="button" class="btn btn-outline-danger" onclick="history.back(-1)">Voltar</button>
	</form>
</div>

<?php
	include "include/rodape.php";
?>