<?php

	include 'include/conexao.php';
    //Verifica a variavel se esta correta ou NULL.
	if (!isset($_GET['id'])) {
		header("Location: corridas.php");
		exit;
	}
    //Comando passado ao BD.
	$sql = sprintf(
		"SELECT * FROM corridas WHERE id = %d",
		$_GET['id']
	);
	$query = mysqli_query($conn, $sql);
    //verifica as linhas do banco com os dados da variavel $sql.
	if (mysqli_num_rows($query) == 0) {
		header("Location: corridas.php");
		exit;
	}
    //Executa o comando ao BD.
	mysqli_query($conn, sprintf(
		"DELETE FROM corridas WHERE id = %d",
		$_GET['id']
	));

	echo "<script>alert('Produto excluído com sucesso!')</script>";
	echo "<script>location.href='corridas.php'</script>";

?>