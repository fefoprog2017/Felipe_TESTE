<?php

	include 'include/conexao.php';
	include 'include/cabecalho.php';

    //Verificando a Var ID, se esta correta ou NULL.
	if (!isset($_GET['id'])) {
		header("Location: corridas.php");
		exit;
	}
    //Variavel criada para printar com format
	$sql = sprintf(
		"SELECT * FROM corridas WHERE id = %d",
		$_GET['id']
	);
	$query = mysqli_query($conn, $sql);
    //Verificação de linhas passando a variavel que contem os dados buscados no BD.
	if (mysqli_num_rows($query) == 0) {
		header("Location: corridas.php");
		exit;
	}
    //Obtendo o resultado como array
	$p = mysqli_fetch_array($query);

?>

<div class="container">
	<h2>Editar <i><?= $p['id']; ?></i></h2>
	<form method="post" action="salvar_corrida.php?id=<?= $p['id']; ?>">
		<div class="form-group">
			<label>ID MOTORISTA:</label>
			<input type="text" name="id_m" class="form-control" placeholder="Digite o ID correto" value="<?= $p['id_m']; ?>">
		</div>
		<div class="form-group">
			<label>ID PASSAGEIRO:</label>
			<input type="text" name="id_p" class="form-control" placeholder="Digite o ID correta" value="<?= $p['id_p']; ?>">
		</div>
		<div class="form-group">
			<label>Valor:</label>
			<input type="text" name="valor" class="form-control" placeholder="Digite o valor correto" value="<?= $p['valor']; ?>">
		</div>
		<button class="btn btn-success">Salvar</button>
		<button type="button" class="btn btn-outline-danger" onclick="history.back(-1)">Voltar</button>
	</form>
</div>

<?php
	include "include/rodape.php";
?>