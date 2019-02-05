<?php

	include 'include/conexao.php';
    
    //Verifica a variavel se esta correta ou NULL.
	if (!isset($_GET['id'])) {
		header("Location: listar_motorista.php");
		exit;
	}
    //Comando passado ao BD.
	$sql = sprintf(
		"SELECT * FROM motorista WHERE id = %d",
		$_GET['id']
	);
	//verifica as linhas do banco com os dados da variavel $sql.
	$query = mysqli_query($conn, $sql);
	
    //Verifica as linhas do BD com o 'ID' passado acima. /\
	if (mysqli_num_rows($query) == 0) {
		header("Location: listar_motorista.php");
		exit;
	}
    //Executa o comando DELETE ao BD.
	mysqli_query($conn, sprintf(
		"DELETE FROM motorista WHERE id = %d",
		$_GET['id']
	));

	echo "<script>alert('Produto excluído com sucesso!')</script>";
	echo "<script>location.href='listar_motorista.php'</script>";

?>